<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Notifications\Notification;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;

class FeedbackMessage extends Notification implements ShouldQueue
{
    use Queueable;

    protected $sender;
    protected $message;

    /**
     * Create a new notification instance.
     *
     * @return void
     */
    public function __construct($sender, $message)
    {
      $this->sender = $sender;
      $this->message = $message;
    }

    /**
     * Get the notification's delivery channels.
     *
     * @param  mixed  $notifiable
     * @return array
     */
    public function via($notifiable)
    {
        return ['mail'];
    }

    /**
     * Get the mail representation of the notification.
     *
     * @param  mixed  $notifiable
     * @return \Illuminate\Notifications\Messages\MailMessage
     */
    public function toMail($notifiable)
    {
        return (new MailMessage)
                    ->greeting('Hi')
                    ->subject('Feedback from '. $this->sender ?? 'Anonymous')
                    ->line('You got a feedback from '. $this->sender ?? 'Anonymous')
                    ->line('Message : '.$this->message)
                    ->markdown('mail.feedback');
    }

    /**
     * Get the array representation of the notification.
     *
     * @param  mixed  $notifiable
     * @return array
     */
    public function toArray($notifiable)
    {
        return [
            //
        ];
    }
}
