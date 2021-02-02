<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use App\Mails\InvoiceMail;
use Illuminate\Contracts\Mail\Mailable;
use Illuminate\Notifications\Notification;
use Illuminate\Contracts\Queue\ShouldQueue;

class InvoiceMailable extends Notification implements ShouldQueue
{
    use Queueable;

    /**
     * Get the notification's delivery channels.
     *
     * @param mixed $notifiable
     * @return array
     */
    public function via($notifiable): array
    {
        return ['mail'];
    }

    /**
     * Get the mail representation of the notification.
     *
     * @param mixed $notifiable
     * @return \Illuminate\Contracts\Mail\Mailable
     */
    public function toMail($notifiable): Mailable
    {
        // TODO: customize based on order status
        return (new InvoiceMail());
    }

    /**
     * Get the array representation of the notification
     *
     * @param mixed $notifiable
     * @return array
     */
    public function toArray($notifiable): array
    {
        return [
            //
        ];
    }
}