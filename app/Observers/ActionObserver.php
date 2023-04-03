<?php

namespace App\Observers;

use App\Models\Action;
use App\Models\ActivityLog;

class ActionObserver
{
    /**
     * Handle the Action "created" event.
     */
    public function created(Action $action): void
    {
        $data = [
            "name" => "action observed for" . $action->name,
            "description" => "action observed",
        ];
        ActivityLog::create($data);
    }

    /**
     * Handle the Action "updated" event.
     */
    public function updated(Action $action): void
    {
        //
    }

    /**
     * Handle the Action "deleted" event.
     */
    public function deleted(Action $action): void
    {
        //
    }

    /**
     * Handle the Action "restored" event.
     */
    public function restored(Action $action): void
    {
        //
    }

    /**
     * Handle the Action "force deleted" event.
     */
    public function forceDeleted(Action $action): void
    {
        //
    }
}
