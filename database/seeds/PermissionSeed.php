<?php

use Illuminate\Database\Seeder;

class PermissionSeed extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $items = [
            
            ['id' => 1, 'title' => 'user_management_access',],
            ['id' => 2, 'title' => 'user_management_create',],
            ['id' => 3, 'title' => 'user_management_edit',],
            ['id' => 4, 'title' => 'user_management_view',],
            ['id' => 5, 'title' => 'user_management_delete',],
            ['id' => 6, 'title' => 'permission_access',],
            ['id' => 7, 'title' => 'permission_create',],
            ['id' => 8, 'title' => 'permission_edit',],
            ['id' => 9, 'title' => 'permission_view',],
            ['id' => 10, 'title' => 'permission_delete',],
            ['id' => 11, 'title' => 'role_access',],
            ['id' => 12, 'title' => 'role_create',],
            ['id' => 13, 'title' => 'role_edit',],
            ['id' => 14, 'title' => 'role_view',],
            ['id' => 15, 'title' => 'role_delete',],
            ['id' => 16, 'title' => 'user_access',],
            ['id' => 17, 'title' => 'user_create',],
            ['id' => 18, 'title' => 'user_edit',],
            ['id' => 19, 'title' => 'user_view',],
            ['id' => 20, 'title' => 'user_delete',],
            ['id' => 21, 'title' => 'engagement_access',],
            ['id' => 22, 'title' => 'engagement_create',],
            ['id' => 23, 'title' => 'engagement_edit',],
            ['id' => 24, 'title' => 'engagement_view',],
            ['id' => 25, 'title' => 'engagement_delete',],

        ];

        foreach ($items as $item) {
            \App\Permission::create($item);
        }
    }
}
