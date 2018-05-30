<?php

namespace App\Notifications;

use Illuminate\Notifications\Messages\MailMessage;

class ResetPasswordNotification extends Notification
{

    private $code;

    public function __construct($code)
    {
        $this->code = $code;
    }

    /**
     * Get the notification's delivery channels.
     *
     * @param  mixed $notifiable
     * @return array
     */
    function via($notifiable)
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
            ->subject(trans('user.reset_password_title', ['name' => config('api.name')]))
            ->view('mail.password_reset', [
                'user' => $notifiable,
                'name' => config('api.name'),
                'link' => config('project.web_base_url') .
                    'password-update?q=' . base64_encode($notifiable->email . '|' . $this->code)
            ]);
    }

    /**
     * Notification text
     * @param $notifiable
     * @return mixed
     */
    function text($notifiable)
    {
        return null;
    }

    /**
     * Notification lik(uri)
     * @return mixed
     */
    function uri()
    {
        return null;
    }

    /**
     * Notification right image url
     * @return mixed
     */
    function rightImageUrl()
    {
        return null;
    }

    /**
     * Notification left image url
     * @return mixed
     */
    function leftImageUrl()
    {
        return null;
    }

    /**
     * Notification title
     * @param $notifiable
     * @return mixed
     */
    function title($notifiable)
    {
        return null;
    }

    /**
     * Notification note
     * @param $notifiable
     * @return mixed
     */
    function note($notifiable)
    {
        return null;
    }

    /**
     * Notification type
     * @return mixed
     */
    function type()
    {
        return null;
    }

    /**
     * Notification point
     * @return mixed
     */
    function point()
    {
        return null;
    }

    /**
     * Notification releated user (Not owner)
     * @return mixed
     */
    function user()
    {
        return null;
    }
}
