<?php

namespace App\Observers;

use App\Models\Activity;
use App\Models\News;
use Illuminate\Support\Facades\Auth;

class NewsObserver
{
    /**
     * Handle the News "created" event.
     */
    public function created(News $news): void
    {
        $activity = Activity::create([
            'desc' => $news->title,
            'action' => 'create news',
        ]);
        $activity->user()->associate(Auth::user());
        $activity->save();
    }

    /**
     * Handle the News "updated" event.
     */
    public function updated(News $news): void
    {
        //
    }

    /**
     * Handle the News "deleted" event.
     */
    public function deleted(News $news): void
    {
        $activity = Activity::create([
            'desc' => $news->title,
            'action' => 'delete news',
        ]);
        $activity->user()->associate(Auth::user());
        $activity->save();
    }

    /**
     * Handle the News "restored" event.
     */
    public function restored(News $news): void
    {
        //
    }

    /**
     * Handle the News "force deleted" event.
     */
    public function forceDeleted(News $news): void
    {
        //
    }
}
