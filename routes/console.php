<?php

use Illuminate\Filesystem\Filesystem;

/*
|--------------------------------------------------------------------------
| Console Routes
|--------------------------------------------------------------------------
|
| This file is where you may define all of your Closure based console
| commands. Each Closure is bound to a command instance allowing a
| simple approach to interacting with each command's IO methods.
|
*/

Artisan::command('public:clear', function (Filesystem $filesystem) {
    $filesystem->delete(public_path('mix-manifest.json'));
    $filesystem->deleteDirectory(public_path('css'));
    $filesystem->deleteDirectory(public_path('fonts'));
    $filesystem->deleteDirectory(public_path('images'));
    $filesystem->deleteDirectory(public_path('js'));

    $this->info('Public assets cleared!');
})->describe('Clear all public assets.');
