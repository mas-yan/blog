<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Permission;

class PermissionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $permissions = [
            'tag_show',
            'tag_create',
            'tag_update',
            'tag_delete',
            'category_show',
            'category_create',
            'category_update',
            // 'category_detail',
            'category_delete',
            'post_show',
            'post_create',
            'post_update',
            'post_detail',
            'post_delete',
            'role_show',
            'role_create',
            'role_update',
            'role_detail',
            'role_delete',
            'user_show',
            'user_create',
            'user_update',
            'user_detail',
            'user_delete',
            'menu_show',
            'menu_create',
            'menu_update',
            'menu_delete',
            'slider_show',
            'slider_create',
            'slider_update',
            'slider_delete',
            'permission_show',
        ];

        foreach ($permissions as $permission) {
            Permission::create([
                'name' => $permission
            ]);
        }
    }
}
