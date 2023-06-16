<?php

namespace ITHilbert\UploadAerzte;

use Exception;
use Illuminate\Support\Facades\Storage;

class SFTP
{
    public $driver = 'local';

    /**
     * Lädt eine Datei per SFTP auf einen anderen Server
     *
     * @param [type] $folder  base_path('/database/seeders')
     * @param [type] $file    MeineDatei.php
     * @return void
     */
    public function upload($folder, $fileName)
    {
        $disk = Storage::build([
            'driver' => $this->driver,
            'root' => $folder,
        ]);

        if ($disk->exists($fileName)) {
            $file = $disk->get($fileName);

            if (! Storage::disk('sftp')->put($fileName, $file)) {
                throw new Exception('Write operation failed!');
                return false;
            }

            return true;
        } else {
            throw new Exception('No such file.');
            return false;
        }
    }
}
