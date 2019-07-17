<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\UserRequest;
use App\Http\Requests\RegisterRequest;
use App\Http\Requests\LoginRequest;
use App\Mail\ContactMail;
use Illuminate\Foundation\Http\FormRequest;
use App\User;
use App\UserProfile;
use App\Order;
use App\Product;
use App\Comment;

class UserController extends Controller
{
    
    public function postLogin(LoginRequest $request)
    {
        $user = $request->only('email','password');
        if(\Auth::attempt($user)) {
            return redirect()->route('home')->with(['flast'=>'success','alert-message'=>'Đăng nhập thành công']);
        }
        return back()->with(['flast'=>'danger','alert-message'=>'Đăng nhập không thành công/Mật khẩu không đúng']);

    }

    public function postRegister(RegisterRequest $request)
    {
        $user = new User();
        $user->fullname = $request->fullname;
        $user->email = $request->email;
        $user->password = bcrypt($request->password);
        $user->save();
        \Auth::attempt(['email'=>$request->email,'password'=>$request->password]);
        return redirect()->route('home')->with(['flast'=>'success','alert-message'=>'Đăng ký thành công']);
    }

    public function profile($id)
    {
        $orders = Order::where('user_id',$id)->get();
        return view('users.profile',compact('orders'));
    }

    public function logoutUser()
    {
        \Auth::logout();
        return redirect()->route('home')->with(['flast'=>'success','alert-message'=>'Đăng xuất thành công']);
    }

    public function updateProfile(UserRequest $request, $id)
    {
        if ($request->has('change_password')) {
            if (\Hash::check($request->old_password, \Auth::user()->password)) {
                $this->validate($request,
                    [
                        'new_password'=>'required|min:8|max:15',
                        're_new_password'=>'required|same:new_password'
                    ],
                    [
                        'new_password.required'=>'Vui lòng nhập password mới của bạn',
                        'new_password.min'=>'Vui lòng nhập ít nhất 8 ký tự',
                        'new_password.max'=>'Vui lòng nhập không quá 15 ký tự',
                        're_new_password.required'=>'Vui lòng nhập lại password mới của bạn',
                        're_new_password.same'=>'Password không trùng nhau'
                    ]
                );
                $data_user  = $request->only('fullname','email');
                $data_user['password'] = bcrypt($request->new_password);
                $user = User::find($id);
                $user->update($data_user);
                $user_profile = $user->profile;
            }else{
                return back()->with(['flast'=>'danger','alert-message'=>'Mật khẩu không đúng']);
            }

        }else{
            $data_user  = $request->only('fullname','email');
            $user = User::find($id);
            $user->update($data_user);
            $user_profile = $user->profile;
        }
        
        if(!$user_profile){
            $profile = new Userprofile();
            $profile->phone = $request->phone;
            $profile->address = $request->address;
            $profile->gender = $request->gender;
            $profile->user_id = $user->id;
            $profile->save();
        }else{
            $data_profile  = $request->only('phone','address','gender');
            $user_profile->update($data_profile);
        }
        
        return back()->with(['flast'=>'success','alert-message'=>'Cập nhật thành công']);
    }

    public function commentProduct(Request $request,$id)
    {
        $data = $request->except('_method','_token','login');
        $comment = new Comment();
        $comment->title = $data['title'];
        $comment->content = $data['content'];
        $comment->rating = $data['rating'];
        $comment->user_id = \Auth::user()->id;
        $comment->product_id = $id;
        $comment->save();
        return back()->with(['flast'=>'success','alert-message'=>'Đã gửi nhận xét thành công']);

    }

    public function showFromContact()
    {
        return view('mail.sendmail');
    }

    public function sendMailContact(Request $request)
    {
        $email = $request->get('email');
        $content = $request->get('content');
        \Mail::to($email)->send(new ContactMail($email,$content));  // sen toi email nao  
        dd('done');
    }
}
