<?php

namespace ITHilbert\UploadAerzte;

use Illuminate\Console\Command;
use Illuminate\Support\Facades\Storage;

class UploadAerzteCommand extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'upload:aerzte';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Upload AerzteSeeder to remote server';

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle(): int
    {
        $disk = Storage::build([
            'driver' => 'local',
            'root' => base_path('/database/seeders'),
        ]);

        if ($disk->exists('VorAerzteTableSeeder.php')) {
            $aerzteSeeder = $disk->get('VorAerzteTableSeeder.php');

            if (! Storage::disk('sftp')->put('VorAerzteSeeder.php', $aerzteSeeder)) {
                $this->error('Write operation failed!');
                return false;
            }

            $this->info('Write operation successful!');
        } else {
            $this->error('No such file.');
            return -1;
        }

        return 0;
    }
}
