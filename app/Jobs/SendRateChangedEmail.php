<?php

namespace App\Jobs;

use App\Entity\Currency;
use App\Mail\RateChanged;
use App\User;
use Illuminate\Bus\Queueable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Support\Facades\Mail;

class SendRateChangedEmail implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    public $user;
    public $currency;
    public $oldRate;


    public function __construct(User $user, Currency $currency, float $oldRate)
    {
        $this->user = $user;
        $this->currency = $currency;
        $this->oldRate = $oldRate;
    }

    /**
     * Execute the job.
     *
     * @return void
     */
    public function handle()
    {
        $users = User::where('id', '<>', $this->user->id)->get();
        foreach ($users as $user) {
            Mail::to($user)->later(now()->addSeconds(10),
                (new RateChanged($this->currency, $this->oldRate, $user->name))->onQueue('notification'));
        }
    }
}
