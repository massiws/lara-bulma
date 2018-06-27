<?php

use App\Permission;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->createPermissions('permissions');

        $this->call(RolesTableSeeder::class);
        $this->createPermissions('roles');

        $this->call(UsersTableSeeder::class);
        $this->createPermissions('users');
    }

    /**
     * Create basic permissions to access table.
     *
     * @param  string $table Table name
     */
    public function createPermissions($table)
    {
        $table = str_replace('_', ' ', $table);
        $permissions = [
            'Browse ' . $table,
            'View ' . $table,
            'Create ' . $table,
            'Edit ' . $table,
            'Delete ' . $table,
        ];

        foreach ($permissions as $name) {
            $permission = new Permission;
            $permission->name = $name;
            $permission->slug = str_slug($name);
            $permission->save();
        }

        echo "\n - permissions for '$table' created!\n";
    }
}
