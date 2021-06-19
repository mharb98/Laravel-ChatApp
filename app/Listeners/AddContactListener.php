<?php

namespace App\Listeners;

use App\Events\AddContact;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;

class AddContactListener
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
     * @param  AddContact  $event
     * @return void
     */
    public function handle(AddContact $event)
    {
        //
    }
}
