<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\UserRequest;
use App\Product;
use App\Order;
use App\OrderDetail;
use App\Image;
use App\User;
use App\UserProfile;
use App\Mail\MailCheckOut;

class CartController extends Controller
{
    public function addCart(Request $request, $id)
    {
        $data = $request->only('qty');
        $products = Product::find($id);
        if (isset($data['qty'])) {
            $qty = $data['qty'];
        }else{
            $qty = 1;
        }
        $cart = ['id'=>$products->id,'name'=>$products->name,'qty'=>$qty,'price'=>$products->price,'weight' => 1,'options'=>['image'=>$products->main_image,'maxqty'=>$products->quantity]];
        \Cart::instance('cart')->add($cart);
        return back()->with(['flast'=>'success','alert-message'=>'Đã thêm một sản phẩm vào giỏ hàng']);
    }

    public function updateCart(Request $request)
    {
        $data = $request->except('_token','_method');
        foreach($data as $key=>$value)
        {
            $rowId = $value[0];
            $qty   = $value[1];
            \Cart::instance('cart')->update($rowId, $qty);
        }

        return back()->with(['flast'=>'success','alert-message'=>'Đã cập nhật giỏ hàng']);
    }

    public function addWishlist($id)
    {
        $products = Product::find($id);
        $wishlist = ['id'=>$products->id,'name'=>$products->name,'qty'=>$products->quantity,'price'=>$products->price,'weight' => 1,'options'=>['image'=>$products->main_image,'description'=>$products->description]];
        \Cart::instance('wishlist')->add($wishlist);
        return back()->with(['flast'=>'success','alert-message'=>'Thêm vào danh sách yêu thích thành công.']);
    }

    public function checkOut(UserRequest $request)
    {
        if($request->has('register')&&!(\Auth::check()))
        {
            $this->validate($request,
                [
                    'password'=>'required|min:8|max:15',
                    're_password'=>'required|same:password'
                ],
                [
                    'password.required'=>'Vui lòng nhập password của bạn',
                    'password.min'=>'Vui lòng nhập ít nhất 8 ký tự',
                    'password.max'=>'Vui lòng nhập không quá 15 ký tự',
                    're_password.required'=>'Vui lòng nhập lại password của bạn',
                    're_password.same'=>'Password không trùng nhau'
                ]
            );

            $user = new User();
            $user->fullname = $request->fullname;
            $user->email = $request->email;
            $user->password = bcrypt($request->password);
            $user->save();
            \Auth::attempt(['email'=>$request->email,'password'=>$request->password]);
            $userprofile = new UserProfile();
            $userprofile->phone = $request->phone;
            $userprofile->address = $request->address;
            $userprofile->gender = $request->gender;
            $userprofile->user_id = $user->id;
            $userprofile->save();
            // tao database order
            $order = new Order();
            $order->code = $user->id.'.'.str_random(4).'.'.rand(0,100);
            $order->fullname = $userprofile->fullname;
            $order->phone = $userprofile->phone;
            $order->address = $userprofile->address;
            $order->total_price = \Cart::instance('cart')->total(0,',','');
            $order->status = 0;
            $order->user_id = $user->id;
            $order->save();
        }else
        {
            if (\Auth::check()&&!(\Auth::user()->profile)) {  // kiem tra dang nhap va ton tai thong tin tai khoan chua
                $userprofile = new UserProfile();
                $userprofile->phone = $request->phone;
                $userprofile->address = $request->address;
                $userprofile->gender = $request->gender;
                $userprofile->user_id = \Auth::user()->id;
                $userprofile->save();
            }else if (!\Auth::check()) {
                return back()->with(['flast'=>'danger','alert-message'=>'Bạn phải đăng nhập trước khi đặt hàng']);
            }
            // tao database order
            $order = new Order();
            $order->code = \Auth::user()->id.'.'.str_random(4).'.'.rand(0,100);
            $order->fullname = $request->fullname;
            $order->phone = $request->phone;
            $order->address = $request->address;
            $order->total_price = \Cart::instance('cart')->total(0,',','');
            $order->status = 0;
            $order->user_id = \Auth::user()->id;
            $order->save();
        }
        
        // tao database orderdetail
        $cart = \Cart::instance('cart')->content();
        $array = []; // chua id của product
        $orderdetails = []; // chua id của product
        foreach($cart as $value)
        {
            $orderdetail = new Orderdetail();
            $orderdetail->quantity = $value->qty;
            $orderdetail->price = $value->price;
            $orderdetail->order_id = $order->id;
            $orderdetail->product_id = $value->id;
            $orderdetail->save();
            $array[] = $value->id;
            $orderdetails[] = $orderdetail;
        }
        $product_od = Product::find($array);
        \Mail::to($request->email)->send(new MailCheckOut($order,$orderdetails,$product_od));  // sen toi email nao4
        \Cart::instance('cart')->destroy();
        return redirect()->route('home')->with(['flast'=>'success','alert-message'=>'Đã đặt hàng thành công.']);
    }

    public function orderDetail($id)
    {
        $orderdetails = OrderDetail::with('product')->where('order_id',$id)->get();
        $product_id = $orderdetails->pluck('product_id');
        foreach($orderdetails as $od) { ?>
            <tr class="cart_item">
                <td class="product-img " style="width: 100px;">
                    <a href="<?php echo url('product-detail',$od->product_id)?>">
                        <img class="primary-img img-small" src="<?php echo asset($od->product->main_image) ?>" alt="single-product">
                    </a>
                </td>
                <td class="product-name text-left">
                    <?php echo $od->product->name?>
                </td>
                <td class="product-number">
                    <span class="amount"><?php echo number_format ( ($od->product->price) ,0 , "," ,"." ) ?> đ</span>
                </td>
                <td class="product-number">
                    <?php echo $od->quantity?>
                </td>
                <td class="product-total">
                    <span class="amount"><?php echo number_format ( ($od->product->price*$od->quantity) ,0 , "," ,"." )?> đ</span>
                </td>
            </tr>
        <?php }
    }

    public function cancelOrder(Request $request)
    {
        $order = Order::find($request->id);
        if($order->status>0){
            return "<p>Không thể hủy đơn hàng này</p>";
        }else{
            $order->status = 3;
            $order->save();
            return "<p>Hủy thành công</p>";
        }
    }
}
