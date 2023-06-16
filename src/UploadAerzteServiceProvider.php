<?php

namespace ITHilbert\UploadAerzte;

use Illuminate\Support\ServiceProvider;

class UploadAerzteServiceProvider extends ServiceProvider
{

    /**
     * Boot the application events.
     *
     * @return void
     */
    public function boot()
    {
        $this->commands( \ITHilbert\UploadAerzte\UploadAerzteCommand::class );

    }
}
