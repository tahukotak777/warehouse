<?php

namespace App\Jobs;

use App\Models\User;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Queue\Queueable;

class ChangeDivision implements ShouldQueue
{
    use Queueable;

    public $attributes;
    public $user;

    /**
     * Create a new job instance.
     */
    public function __construct($attributes, $id)
    {
        $this->attributes = $attributes;
        $this->user = User::findOrFail($id);
    }

    /**
     * Execute the job.
     */
    public function handle(): void
    {
        $this->user->update([
            'division'=>$this->attributes['division'],
        ]);
    }
}
