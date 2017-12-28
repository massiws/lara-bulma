<?php

use App\Role;
use Illuminate\Database\Seeder;

class RolesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // Define some initial roles for users.
        $names = [
            'Super Admin',
            'User',
        ];

        $x = 0;
        foreach ($names as $name) {
            $role = new Role;
            $role->slug = str_slug($name);
            $role->name = $name;
            $role->save();

            echo " - " . ++$x . " items created!\r";
        }
    }
}
