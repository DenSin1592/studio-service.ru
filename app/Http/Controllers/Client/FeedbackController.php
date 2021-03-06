<?php

namespace App\Http\Controllers\Client;

use App\Exceptions\Handler;
use App\Http\Controllers\Controller;
use App\Mail\FeedbackCreated;
use App\Services\FormProcessors\Feedback\FeedbackFormProcessor;

class FeedbackController extends Controller
{
    public function __construct(
        private FeedbackFormProcessor $formProcessor
    ){}

    public function __invoke()
    {
        if (!\Request::ajax())
            \App::abort(404, 'Page not found');

        $feedback = $this->formProcessor->create(\Request::all());

        if (is_null($feedback))
            return \Response::json(['errors' => $this->formProcessor->errors()]);


        try {
            \Mail::queue(new FeedbackCreated($feedback));
        } catch (\Throwable $ex) {
            resolve(Handler::class)->report($ex);
        }

        $title = 'Ваша заявка принята';
        $content = 'В ближайшее время с Вами свяжется наш менеджер.';

        return \Response::json([
            'success' => true,
            'title' => $title,
            'content' => $content,
        ]);
    }
}
