<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use App\Mails\InvoiceMail;
use Illuminate\Contracts\Mail\Mailable;
use Illuminate\Notifications\Notification;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\AnonymousNotifiable;

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
        $recipient = $notifiable instanceof AnonymousNotifiable
             ? $notifiable->routeNotificationFor('mail')
             : $notifiable->email;

        // TODO: customize based on order status
        return (new InvoiceMail())
            ->to($recipient);
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