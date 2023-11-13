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

        if ($disk->exists('DatabaseSeeder.php')) {
            $praxisSeeder = $disk->get('DatabaseSeeder.php');

            if (! Storage::disk('sftp')->put('DatabaseSeeder.php', $praxisSeeder)) {
                $this->error('Write operation failed! (DatabaseSeeder.php)');
                return -1;
            }

            $this->info('Write operation successful! (DatabaseSeeder.php)');
        } else {
            $this->error('No such file: DatabaseSeeder.php.');
            return -1;
        }

        return 0;
    }
}
