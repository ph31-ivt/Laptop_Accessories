<?php

namespace App\Observers;

use App\User;
use App\Userprofile;
use App\Order;
use App\DB;

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
       //
    }
    public function deleting(User $user){
         
         $userprofiles=Userprofile::where('user_id', $user->id)->get();
         foreach ($userprofiles as $userprofile) {
             $userprofile->delete();
         }
         $orderlist=Order::where('user_id',$user->id)->get();
         foreach ($orderlist as $order) {
            //dd($order);
             $order->delete();//->observer order to delete orderdetail
         }
         
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
