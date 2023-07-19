<?php

namespace App\Listeners;

use App\Events\StoppageEvent;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;

class ProcessNewStoppage
{
    /**
     * Create the event listener.
     *
     * @return void
     */
    public function __construct()
    {
        dd('ccccc') ;
     }

    /**
     * Handle the event.
     *
     * @param  \App\Events\StoppageEvent  $event
     * @return void
     */
    public function handle(StoppageEvent $event)
    {
        dd('aaaaaaaaaa') ;

           // Redirect to the admin index route
           return redirect()->route('admin.index');
    }
}
