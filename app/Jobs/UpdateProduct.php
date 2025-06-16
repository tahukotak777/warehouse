<?php

namespace App\Jobs;

use App\Models\products;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Queue\Queueable;
use Illuminate\Support\Facades\Validator;

class UpdateProduct implements ShouldQueue
{
    use Queueable;

    protected $attributes;
    protected $product;

    /**
     * Create a new job instance.
     */
    public function __construct($attributes, $id)
    {
        $this->attributes = $attributes;
        $this->product = products::findOrFail($id);
    }

    /**
     * Execute the job.
     */
    public function handle()
    {
        $validate =  Validator::make($this->attributes, [
            'name'=>'required',
            'sku'=>'required',
            'description'=>'required',
            'unit'=>'required',
        ]);

        $this->product->update($this->attributes);
        // $this->product->save();
    }
}
