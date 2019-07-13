<?php

namespace App\Observers;

use App\User;
use App\Userprofile;
use App\Order;
use App\OrderDetail;

class UserObserver
{
    /**
     * Handle the user "created" event.
     *
     * @param  \App\User  $user
     * @return void
     */
    public function created(User $user)
    {
        //
    }

    /**
     * Handle the user "updated" event.
     *
     * @param  \App\User  $user
     * @return void
     */
    public function updated(User $user)
    {
        //
    }

    /**
     * Handle the user "deleted" event.
     *
     * @param  \App\User  $user
     * @return void
     */
    public function deleted(User $user)
    {
        //$userprofile=Userprofile::find($user->id)
        // $userprofile::delete();
        // $orderlist=Order::where('user_id',$user->id)->get();
        // //continue...
    }
    public function deleting(User $user){
         $userprofile=Userprofile::find($user->id)
         $userprofile::delete();
         $orderlist=Order::where('user_id',$user->id)->get();
         //continue...
    }
    /**
     * Handle the user "restored" event.
     *
     * @param  \App\User  $user
     * @return void
     */
    public function restored(User $user)
    {
        //
    }

    /**
     * Handle the user "force deleted" event.
     *
     * @param  \App\User  $user
     * @return void
     */
    public function forceDeleted(User $user)
    {
        //
    }
}
