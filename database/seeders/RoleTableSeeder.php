<?php

namespace Database\Seeders;

use App\Services\General\RoleService;
use Illuminate\Database\Seeder;

class RoleTableSeeder extends Seeder
{
    /**
     * @var RoleService
     */
    private $roleService;

    /**
     * RolesTableSeeder constructor.
     *
     * @param RoleService $roleService
     */
    public function __construct(RoleService $roleService)
    {
        $this->roleService = $roleService;
    }

    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $roles = [
            [
                'name'         => 'admin',
                'display_name' => 'Admin',
            ],
            [
                'name'         => 'school',
                'display_name' => 'School',
            ],
            [
                'name'         => 'principal',
                'display_name' => 'Principal',
            ],
            [
                'name'         => 'teacher',
                'display_name' => 'Teacher',
            ],
            [
                'name'         => 'student',
                'display_name' => 'Student',
            ],
            [
                'name'         => 'parent',
                'display_name' => 'Parent',
            ],
        ];
        foreach ($roles as $role) {
            $this->roleService->updateOrCreate(['name' => $role['name']], $role);
        }
    }
}
