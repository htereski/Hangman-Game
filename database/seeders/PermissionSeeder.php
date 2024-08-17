<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class PermissionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $roles = DB::table('roles')->get();
        $resources = DB::table('resources')->get();

        $data = [];

        foreach ($roles as $role) {
            foreach ($resources as $resource) {
                if ($role->name == 'ADMIN') {
                    $data[] = [
                        'role_id' => $role->id,
                        'resource_id' => $resource->id,
                        'permission' => 1
                    ];
                } else if ($role->name == 'PLAYER') {
                    if ($resource->name == 'category.index' || $resource->name == 'word.index') {
                        $data[] = [
                            'role_id' => $role->id,
                            'resource_id' => $resource->id,
                            'permission' => 1
                        ];
                    } else {
                        $data[] = [
                            'role_id' => $role->id,
                            'resource_id' => $resource->id,
                            'permission' => 0
                        ];
                    }
                }
            }
        }

        DB::table('permissions')->insert($data);
    }
}
