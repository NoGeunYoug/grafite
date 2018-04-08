<?php

use App\Models\User;
use App\Services\UserService;
use Illuminate\Database\Seeder;

class UserTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $service = app(UserService::class);

        if (!User::where('name', 'admin')->first()) {
            $user = User::create([
                'name'     => env('ADMIN_NAME', 'Admin'),
                'email'    => env('ADMIN_EMAIL', 'admin@example.com'),
                'password' => bcrypt(env('ADMIN_PASSWORD', 'admin')),
            ]);

            $service->create($user, 'admin', 'admin', false);
        }
    }
}
