<?php

namespace App\Listeners;

use App\Events\NewStoppageAdded;
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
     * @param  \App\Events\NewStoppageAdded  $event
     * @return void
     */
    public function handle(NewStoppageAdded $event)
    {
        dd('aaaaaaaaaa') ;  

           // Redirect to the admin index route
           return redirect()->route('admin.index');
    }
}
