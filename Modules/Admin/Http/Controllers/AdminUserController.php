<?php

namespace Modules\Admin\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Routing\Controller;
use App\Http\Requests\UpdateUserRequest;
use App\User;
use App\UserProfile;

class AdminUserController extends Controller
{
    /**
     * Display a listing of the resource.
     * @return Response
     */
    public function index()
    {   $userlist=User::All();
        return view('admin::user.index',compact('userlist'));
    }

    /**
     * Show the form for creating a new resource.
     * @return Response
     */
    public function create()
    {
        return view('admin::create');
    }

    /**
     * Store a newly created resource in storage.
     * @param Request $request
     * @return Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Show the specified resource.
     * @param int $id
     * @return Response
     */
    public function show($id)
    {
        return view('admin::show');
    }

    /**
     * Show the form for editing the specified resource.
     * @param int $id
     * @return Response
     */
    public function edit($id)
    {   $user=User::find($id);
        $profile=User::find($id)->profile;
        if($profile!=null){
             return view('admin::user.edit',compact('profile', 'user'));
        }
        return back()->with('msg', 'Create user_profile on user interface,  please!')->with('attribute', 'warning');
    }

    /**
     * Update the specified resource in storage.
     * @param Request $request
     * @param int $id
     * @return Response
     */
    public function update(UpdateUserRequest $request, $id)
    {
      $data=$request->only('fullname','email');
      $user=User::find($id);
      $user->update($data);
      $data=$request->only('phone', 'address','gender', 'role');
      $userprofile=User::find($id)->profile;
      $userprofile->update($data);
      return back()->with('msg', 'Update is successful');

    }
    public function getguest(){
        $userlist=User::with('profile')->get();
        for($i=0; $i<count($userlist); $i++)
        {
            if($userlist[$i]->profile!=null){
                unset($userlist[$i]);
            }
        }
        return view('admin::user.index',compact('userlist'));
    }
    /**
     * Remove the specified resource from storage.
     * @param int $id
     * @return Response
     */
    public function destroy($id)
    {
        $user= User::find($id);
        $user->delete();
        return back()->with('msg','User: '.$user->fullname.' has been deleted')->with('attribute','warning');
        
    }
}
