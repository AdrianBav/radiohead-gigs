<?php

namespace App\Console\Commands;

use App\User;
use Illuminate\Support\Str;
use Illuminate\Console\Command;

class RegisterApiUser extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'auth:register-api-user';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Register a new API user for the Bavanco Website';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @return mixed
     */
    public function handle()
    {
        User::create([
            'name' => 'Bavanco Website',
            'email' => 'www@bavanco.co.uk',
            'password' => Str::random(25),
            'api_token' => Str::random(60),
        ]);

        $this->info('Successfully created API user for the Bavanco Website');
    }
}
