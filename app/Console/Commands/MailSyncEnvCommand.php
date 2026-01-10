<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\SmEmailSetting;

class MailSyncEnvCommand extends Command
{
    protected $signature = 'mail:sync-env {--school_id=1}';
    protected $description = 'Sync .env SMTP settings into SmEmailSetting for the given school_id';

    public function handle()
    {
        $schoolId = (int) $this->option('school_id');

        $driver = config('mail.default', env('MAIL_MAILER', 'smtp'));
        $host = config('mail.mailers.smtp.host', env('MAIL_HOST'));
        $port = (int) (config('mail.mailers.smtp.port', env('MAIL_PORT', 587)));
        $username = config('mail.mailers.smtp.username', env('MAIL_USERNAME'));
        $password = config('mail.mailers.smtp.password', env('MAIL_PASSWORD'));
        $encryption = config('mail.mailers.smtp.encryption', env('MAIL_ENCRYPTION', 'tls'));
        $fromAddress = config('mail.from.address', env('MAIL_FROM_ADDRESS'));
        $fromName = config('mail.from.name', env('MAIL_FROM_NAME', 'Infix Edu'));

        if (!$host || !$username || !$password) {
            $this->error('MAIL_HOST, MAIL_USERNAME, and MAIL_PASSWORD must be set in .env before syncing.');
            return Command::FAILURE;
        }

        $setting = SmEmailSetting::firstOrNew(['school_id' => $schoolId]);
        $setting->active_status = 1;
        $setting->mail_driver = $driver ?: 'smtp';
        $setting->mail_host = $host;
        $setting->mail_port = $port;
        $setting->mail_username = $username;
        $setting->mail_password = $password;
        $setting->mail_encryption = $encryption;
        $setting->from_email = $fromAddress ?: $username;
        $setting->from_name = $fromName ?: 'Infix Edu';
        $setting->save();

        $this->info("SmEmailSetting synced for school_id={$schoolId} using driver={$setting->mail_driver} host={$setting->mail_host}.");
        return Command::SUCCESS;
    }
}
