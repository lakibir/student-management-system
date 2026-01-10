<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\SmStudent;

class ReportStudentEmailsCommand extends Command
{
    protected $signature = 'student:emails:report {--limit=50}';
    protected $description = 'Report students missing usable email (no SmStudent.email and no related User.email)';

    public function handle()
    {
        $limit = (int) $this->option('limit');

        $total = SmStudent::count();

        $missing = SmStudent::with('user')
            ->where(function ($q) {
                $q->whereNull('email')->orWhere('email', '');
            })
            ->get()
            ->filter(function ($s) {
                return empty(optional($s->user)->email);
            });

        $missingCount = $missing->count();

        $this->info("Total students: {$total}");
        $this->info("Students missing usable email: {$missingCount}");

        if ($missingCount > 0) {
            $this->line(str_repeat('-', 60));
            $this->line("Sample (up to {$limit}) of students missing emails:");
            $this->line(str_pad('ID', 8) . str_pad('Name', 30) . 'Username/UID');
            $this->line(str_repeat('-', 60));

            foreach ($missing->take($limit) as $s) {
                $this->line(str_pad((string)$s->id, 8) . str_pad((string)$s->full_name, 30) . (string)$s->user_id);
            }
        }

        return Command::SUCCESS;
    }
}
