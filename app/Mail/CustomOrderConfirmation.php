<?php

namespace App\Mail;

use App\Models\CustomOrder;
use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class CustomOrderConfirmation extends Mailable
{
    use Queueable, SerializesModels;

    public $order;

    public function __construct(CustomOrder $order)
    {
        $this->order = $order;
    }

    public function build()
    {
        return $this->subject('Custom Order Confirmation - McRifle')
                    ->markdown('emails.custom-order-confirmation');
    }
} 