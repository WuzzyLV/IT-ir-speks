<?php

namespace App\Observers;

use App\Models\Vacancy;

class VacancyObserver
{
    /**
     * Handle the Vacancy "created" event.
     */
    public function created(Vacancy $vacancy): void
    {
        //
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
        //
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
