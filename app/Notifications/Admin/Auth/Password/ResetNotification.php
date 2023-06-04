<?php

namespace App\Notifications\Admin\Auth\Password;

use App\Notifications\MailMessage as NotificationsMailMessage;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;
use Illuminate\Support\Facades\Lang;

class ResetNotification extends Notification
{
    use Queueable;

    /**
     * Create a new notification instance.
     */
    public function __construct()
    {
        //
    }

    /**
     * Get the notification's delivery channels.
     *
     * @return array<int, string>
     */
    public function via(object $notifiable): array
    {
        return ['mail'];
    }

    /**
     * Get the mail representation of the notification.
     */
    public function toMail(object $notifiable): MailMessage
    {
        return (new NotificationsMailMessage)
            ->subject("Password Changed")
            ->greeting(Lang::get("Hello {$notifiable->getAttribute('name')}"))
            ->line(Lang::get("You are receiving this mail because your " . config('binkap.name') . " has just been changed"))
            ->with(Lang::get('If you did not initiate this action, contact support immediately'));;
    }

    /**
     * Get the array representation of the notification.
     *
     * @return array<string, mixed>
     */
    public function toArray(object $notifiable): array
    {
        return [
            //
        ];
    }
}
