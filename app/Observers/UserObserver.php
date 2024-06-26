<?php

namespace App\Observers;

use App\Models\Activity;
use App\Models\User;
use Illuminate\Support\Facades\Auth;

class UserObserver
{
    /**
     * Handle the User "created" event.
     */
    public function created(User $user): void
    {
        try{
            if (!$user){
                return;
            }
            $activity = Activity::create([
                'desc' => $user->role()->first()->name,
                'action' => 'create user',
            ]);
            $activity->user()->associate($user);
            $activity->save();
        } catch (\Exception $e){
            return;
        }
    }

    /**
     * Handle the User "updated" event.
     */
    public function updated(User $user): void
    {
        //
    }

    /**
     * Handle the User "deleted" event.
     */
    public function deleted(User $user): void
    {
        // $activity = Activity::create([
        //     'desc' => $user->role()->first()->name,
        //     'action' => 'delete user',
        // ]);
        // $activity->user()->associate($user);
        // $activity->save();
    }

    /**
     * Handle the User "restored" event.
     */
    public function restored(User $user): void
    {
        //
    }

    /**
     * Handle the User "force deleted" event.
     */
    public function forceDeleted(User $user): void
    {
        //
    }
}
