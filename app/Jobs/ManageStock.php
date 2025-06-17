<?php

namespace App\Jobs;

use App\Events\Activity;
use App\Models\products;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Queue\Queueable;
use Illuminate\Support\Facades\Validator;

class ManageStock implements ShouldQueue
{
    use Queueable;

    public $attributes;
    public $user_id;
    /**
     * Create a new job instance.
     */
    public function __construct($attributes, $user_id)
    {
        $this->attributes = $attributes;
        $this->user_id = $user_id;
    }

    /**
     * Execute the job.
     */
    public function handle(): void
    {
        $validate = Validator::make($this->attributes, [
            'product_id' => "required",
            'mutation_type' => 'required',
            'quantity' => 'required',
        ]);

        $product = products::findOrFail($this->attributes['product_id']);

        if ($this->attributes['mutation_type'] == "IN") {
            $product->update([
                'stock' => $product->stock + $this->attributes['quantity'],
            ]);
        } else if ($this->attributes['mutation_type'] == "OUT") {
            $product->update([
                'stock' => $product->stock - $this->attributes['quantity'],
            ]);
        }

        event(new Activity($product->id, $this->attributes['mutation_type'], $this->attributes['quantity'], $this->user_id));
    }
}
