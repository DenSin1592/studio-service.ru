<?php namespace App\Providers;

use Diol\LaravelMailer\Mailer;
use Diol\LaravelMailer\MailManager;
use Illuminate\Support\ServiceProvider;
use Setting;

/**
 * Class MailServiceProvider
 * @package App\Providers
 */
class MailServiceProvider extends ServiceProvider
{
    public function boot()
    {
        // Set from address and reply to address from constants
        $this->app->resolving('mail.manager', function (MailManager $mailManager) {
            $mailManager->setMailerConfigurator(function (Mailer $mailer) {
                $fromAddress = Setting::get('mail.from.address');
                if ($fromAddress) {
                    $mailer->alwaysFrom($fromAddress, Setting::get('mail.from.name'));
                }

                $replyToAddress = Setting::get('mail.reply_to.address');
                if ($replyToAddress) {
                    $mailer->alwaysReplyTo($replyToAddress);
                }
            });
        });
    }
}
