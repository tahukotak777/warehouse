<?php

namespace App\Jobs;

use App\Models\products;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Queue\Queueable;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\ValidationException;
use Throwable;

class StoreProduct implements ShouldQueue
{
    use Queueable;

    protected $attributes;
    /**
     * Create a new job instance.
     */
    public function __construct($attributes)
    {
        $this->attributes = $attributes;
    }

    /**
     * Execute the job.
     */
    public function handle()
    {
        try {
            $validate = Validator::make($this->attributes, [
                'name'=>'required',
                'sku'=>'required',
                'description'=>'required',
                'stock'=>'nullable',
                'unit'=>'required',
            ])->validate();

            products::create($validate);
        } catch (Throwable $e) {
            Log::error('gagal menyimpan produk: ' . $e->getMessage());
            throw $e;
        }
    }
}
