<?php

namespace App\Jobs;

use App\Models\products;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Queue\Queueable;

class DeleteProduct implements ShouldQueue
{
    use Queueable;


    protected $product;
    /**
     * Create a new job instance.
     */
    public function __construct($id)
    {
        $this->product = products::findOrFail($id);
    }

    /**
     * Execute the job.
     */
    public function handle(): void
    {
        $this->product->delete();
    }
}
