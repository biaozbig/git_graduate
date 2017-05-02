<?php

namespace App\Listeners;

use App\Events\taskEVENT;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;

class taskListener
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
     * @param  taskEVENT  $event
     * @return void
     */
    public function handle(taskEVENT $event)
    {
        //
    }
}
