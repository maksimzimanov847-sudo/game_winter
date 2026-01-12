<?php

namespace App\Console\Commands;

use App\Models\User;
use Illuminate\Console\Command;

class CreateUserAdmin extends Command
{

    protected $signature = 'generate-admin';


    protected $description = 'Command description';


    public function handle(): void
    {


        $email = "admin@admin.com";
        $password = bcrypt('root');
        User::factory()->create([
            'role' => 1,
            'name' => 'admin',
            'email' => $email,
            'password' => $password,
        ]);

        $this->info("Пользователь создан! Пароль: $password. Email: $email");
    }

}
