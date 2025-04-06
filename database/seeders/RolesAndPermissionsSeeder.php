<?php

declare(strict_types=1);

namespace Database\Seeders;

use App\Enums\Permission as PermissionEnum;
use App\Enums\Role as RoleEnum;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Permission as PermissionModel;
use Spatie\Permission\Models\Role as RoleModel;
use Spatie\Permission\PermissionRegistrar;

class RolesAndPermissionsSeeder extends Seeder
{
    use WithoutModelEvents;

    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Reset cached roles and permissions
        app(PermissionRegistrar::class)->forgetCachedPermissions();

        $existingPermissions = PermissionModel::all()->pluck('name')->toArray();

        foreach (PermissionEnum::cases() as $permissionEnum) {
            if (! in_array($permissionEnum->value, $existingPermissions)) {
                PermissionModel::create(['name' => $permissionEnum->value]);
            }
        }

        app(PermissionRegistrar::class)->forgetCachedPermissions();

        $existingRoles = RoleModel::all();

        foreach (RoleEnum::cases() as $roleEnum) {
            $roleModel = $existingRoles->firstWhere('name', $roleEnum->value);

            if (! $roleModel) {
                $roleModel = RoleModel::create(['name' => $roleEnum->value]);
            }

            if ($roleEnum === RoleEnum::SUPER_ADMIN) {
                continue;
            }

            $roleModel->syncPermissions($roleEnum->permissions());
        }

        app(PermissionRegistrar::class)->forgetCachedPermissions();
    }
}
