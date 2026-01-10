<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Config;
use App\SmEmailSetting;

class TestMailCommand extends Command
{
    protected $signature = 'mail:test {email} {--subject=Test Mail}';
    protected $description = 'Send a test email using the active Email Settings configuration';

    public function handle()
    {
        $email = $this->argument('email');
        $subject = $this->option('subject');

        $setting = SmEmailSetting::where('active_status', 1)->first();
        if (!$setting) {
            $this->error('No active email settings found (SmEmailSetting). Configure System Settings → Email Settings.');
            return Command::FAILURE;
        }

        $driver = $setting->mail_driver ?: 'smtp';
        if ($driver === 'smtp') {
            Config::set('mail.default', 'smtp');
            Config::set('mail.from.address', $setting->from_email);
            Config::set('mail.from.name', $setting->from_name);
            Config::set('mail.mailers.smtp.host', $setting->mail_host);
            Config::set('mail.mailers.smtp.port', (int) $setting->mail_port);
            Config::set('mail.mailers.smtp.username', $setting->mail_username);
            Config::set('mail.mailers.smtp.password', $setting->mail_password);
            Config::set('mail.mailers.smtp.encryption', $setting->mail_encryption);
        } else {
            Config::set('mail.default', 'sendmail');
        }

        try {
            Mail::raw('This is a test email from Infix Edu.', function ($message) use ($email, $subject, $setting) {
                $message->to($email)->subject($subject);
                if ($setting->from_email) {
                    $message->from($setting->from_email, $setting->from_name ?: 'Infix Edu');
                }
            });
            $this->info("Test email queued/sent to: {$email}");
            return Command::SUCCESS;
        } catch (\Exception $e) {
            $this->error('Failed to send test email: ' . $e->getMessage());
            return Command::FAILURE;
        }
    }
}
