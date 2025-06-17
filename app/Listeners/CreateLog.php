<?php

namespace App\Listeners;

use App\Events\Activity;
use App\Models\product_log;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;

class CreateLog
{
    /**
     * Create the event listener.
     */
    public function __construct()
    {
        //
    }

    /**
     * Handle the event.
     */
    public function handle(Activity $event): void
    {
        product_log::create([
            'user_id'=>$event->user_id,
            'product_id'=>$event->IdProduct,
            'mutation_type'=>$event->mutation_type,
            'quantity'=>$event->quantity,
        ]);
    }
}
