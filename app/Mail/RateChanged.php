<?php

namespace App\Mail;

use App\Entity\Currency;
use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;

class RateChanged extends Mailable
{
    use Queueable, SerializesModels;

    private $currency;
    private $oldRate;
    private $userName;

    /**
     * Create a new message instance.
     * @param Currency $currency
     * @param float $oldRate
     * @param string $userName
     */
    public function __construct(Currency $currency, float $oldRate, string $userName)
    {
        $this->currency = $currency;
        $this->oldRate = $oldRate;
        $this->userName = $userName;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->from(['address' => 'serega_mu_fun@ukr.net', 'name' => 'Currency market'])
            ->view('emails.rate-changes')
            ->with([
                'oldRate' => $this->oldRate,
                'newRate' => $this->currency->rate,
                'title' => $this->currency->name,
                'userName' => $this->userName
            ])
            ->subject('example theme');
    }
}