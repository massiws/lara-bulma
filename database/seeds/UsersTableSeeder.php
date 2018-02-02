<?php

use App\User;
use Illuminate\Database\Seeder;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $users = [
            [
                'role_id' => env('ADMIN_ROLES', 1),
                'name' => 'Super Admin',
                'email' => 'admin@admin.com',
                'password' => bcrypt('123456'),
            ],
            [
                'role_id' => env('DEFAULT_ROLE', 2),
                'name' => 'Simple user',
                'email' => 'user@user.com',
                'password' => bcrypt('123456'),
            ],
        ];

        $x = 0;
        foreach ($users as $attributes) {
            $user = new User($attributes);
            $user->save();

            echo " - " . ++$x . " items created!\r";
        }
    }
}
