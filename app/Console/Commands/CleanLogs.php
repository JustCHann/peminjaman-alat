<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\Models\Aktivitas;

class CleanLogs extends Command
{
    protected $signature = 'logs:clean';
    protected $description = 'Hapus log aktivitas lebih dari 5 hari';

    public function handle()
    {
        $deleted = Aktivitas::where('created_at', '<', now()->subDays(5))->delete();

        $this->info("Berhasil hapus $deleted log lama.");

        return 0;
    }
}