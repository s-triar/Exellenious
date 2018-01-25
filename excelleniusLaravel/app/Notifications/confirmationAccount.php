<?php
namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Notifications\Notification;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;

class confirmationAccount extends Notification

{
    use Queueable;
    private $token;
    private $nama;

    /**
     * Create a new notification instance.
     *
     * @return void
     */
    public function __construct($nama, $token)
    {
        $this->token = $token;
        $this->nama = $nama;
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
          ->subject('Aktivasi Akun Excellenius')
          ->greeting('Dear Team '.$this->nama.', ')
          ->line('Pendaftaran anda sudah berhasil, silakan aktivasi akun anda.')
          ->action('Aktivasi', url('/confirm-register', $this->token))
          ->salutation('Excellenius');
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

