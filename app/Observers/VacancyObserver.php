<?php

namespace App\Observers;

use App\Models\Activity;
use App\Models\Vacancy;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;

class VacancyObserver
{
    /**
     * Handle the Vacancy "created" event.
     */
    public function created(Vacancy $vacancy): void
    {
        $activity = Activity::create([
            'desc' => $vacancy->title,
            'action' => 'create vacancy',
        ]);
        $activity->user()->associate(Auth::user());
        $activity->save();
    }

    /**
     * Handle the Vacancy "updated" event.
     */
    public function updated(Vacancy $vacancy): void
    {
        //
    }

    /**
     * Handle the Vacancy "deleted" event.
     */
    public function deleted(Vacancy $vacancy): void
    {
        $activity = Activity::create([
            'desc' => $vacancy->title,
            'action' => 'delete vacancy',
        ]);
        $activity->user()->associate(Auth::user());
        $activity->save();
    }

    /**
     * Handle the Vacancy "restored" event.
     */
    public function restored(Vacancy $vacancy): void
    {
        //
    }

    /**
     * Handle the Vacancy "force deleted" event.
     */
    public function forceDeleted(Vacancy $vacancy): void
    {
        //
    }
}
