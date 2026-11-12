<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;
use Illuminate\Support\Facades\URL;

class VerifyEmail extends Notification
{
    use Queueable;


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
    /* Aqui se define el correo que se enviará al usuario para verificar su correo electrónico
    El objeto $notifiable es el usuario que se está registrando
    y se le pasa la notificación de verificación de correo electrónico
    */
    public function toMail(object $notifiable): MailMessage
    {
        $verificationUrl = URL::temporarySignedRoute(
            'verification.verify',
            now()->addMinutes(60),
            [
                'id' => $notifiable->getKey(),
                'hash' => sha1($notifiable->getEmailForVerification()),
            ]
        );

        return (new MailMessage)
            ->subject('Verificar tu correo en CashTrackr')
            ->greeting('Hola ' . $notifiable->name)
            ->line('Haz click en el botón a continuación para verificar tu correo electrónico.')
            ->action('Confirmar Cuenta.', $verificationUrl)
            ->line('Si no creaste esta cuenta, ignora este mensaje.');
    }
}
