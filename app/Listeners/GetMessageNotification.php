<?php

namespace App\Listeners;

use App\Events\GetMessage;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;

class GetMessageNotification
{
    /**
     * Create the event listener.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    /**
     * Handle the event.
     *
     * @param  GetMessage  $event
     * @return void
     */
    public function handle(GetMessage $event)
    {
        //
    }
}
