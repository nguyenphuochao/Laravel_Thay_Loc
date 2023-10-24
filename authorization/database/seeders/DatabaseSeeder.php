<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        DB::table('permissions')->insert([
            ['id' => 1, 'name' => 'view_student'],
            ['id' => 2, 'name' => 'update_student'],
            ['id' => 3, 'name' => 'create_student'],
            ['id' => 4, 'name' => 'delete_student'],
            ['id' => 5, 'name' => 'restore_student'],
            ['id' => 6, 'name' => 'force_delete_student'],
            ['id' => 7, 'name' => 'view_subject'],
            ['id' => 8, 'name' => 'update_subject'],
            ['id' => 9, 'name' => 'create_subject'],
            ['id' => 10, 'name' => 'delete_subject'],
            ['id' => 11, 'name' => 'restore_subject'],
            ['id' => 12, 'name' => 'force_delete_subject'],
            ['id' => 13, 'name' => 'view_register'],
            ['id' => 14, 'name' => 'update_register'],
            ['id' => 15, 'name' => 'create_register'],
            ['id' => 16, 'name' => 'delete_register'],
            ['id' => 17, 'name' => 'restore_register'],
            ['id' => 18, 'name' => 'force_delete_register'],

        ]);

        DB::table('roles')->insert([
            ['id' => 1, 'name' => 'admin'],
            ['id' => 2, 'name' => 'viewer'],
        ]);
        DB::table('role_user')->insert(
            [
                [
                    'role_id' => 1,
                    'user_id' => 23,
                ],
                [
                    'role_id' => 2,
                    'user_id' => 24,
                ]
            ]
        );
        DB::table('permission_role')->insert([
            ['permission_id' => 1, 'role_id' => 1],
            ['permission_id' => 2, 'role_id' => 1],
            ['permission_id' => 3, 'role_id' => 1],
            ['permission_id' => 4, 'role_id' => 1],
            ['permission_id' => 5, 'role_id' => 1],
            ['permission_id' => 6, 'role_id' => 1],
            ['permission_id' => 7, 'role_id' => 1],
            ['permission_id' => 8, 'role_id' => 1],
            ['permission_id' => 9, 'role_id' => 1],
            ['permission_id' => 10, 'role_id' => 1],
            ['permission_id' => 11, 'role_id' => 1],
            ['permission_id' => 12, 'role_id' => 1],
            ['permission_id' => 13, 'role_id' => 1],
            ['permission_id' => 14, 'role_id' => 1],
            ['permission_id' => 15, 'role_id' => 1],
            ['permission_id' => 16, 'role_id' => 1],
            ['permission_id' => 17, 'role_id' => 1],
            ['permission_id' => 18, 'role_id' => 1],
        ]);
    }
}
