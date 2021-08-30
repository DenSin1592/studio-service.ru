<?php

namespace App\Mail;

use App\Models\Feedback;
use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class FeedbackCreated extends Mailable
{
    use Queueable, SerializesModels;

    public function __construct(
        private Feedback $feedback)
    {}

    public function build()
    {
        $subject = "Новая заявка на обратный звонок №{$this->feedback->id} на сайте " . route('home');
        $userData = [
            ['title' => 'ФИО', 'value' => $this->feedback->name],
            ['title' => 'Почта', 'value' => $this->feedback->email],
            ['title' => 'Телефон', 'value' => $this->feedback->phone],
        ];
        $userData = array_filter($userData,
            static fn(array $dataPiece) => !is_null($dataPiece['value']) && $dataPiece['value'] !== ''
        );

        return $this->view('emails.feedback.created')
            ->subject($subject)->with([
                'subject' => $subject,
                'feedback' => $this->feedback,
                'userData' => $userData,
            ])
            ->to(\Setting::get('mail.feedback.address'))
        ;
    }
}
