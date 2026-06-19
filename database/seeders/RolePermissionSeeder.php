<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;

class RolePermissionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        app()[\Spatie\Permission\PermissionRegistrar::class]
            ->forgetCachedPermissions();

        $permissions = [

            // Categorías
            'categories.index',
            'categories.create',
            'categories.edit',
            'categories.delete',

            // Productos
            'products.index',
            'products.create',
            'products.edit',
            'products.delete',

            // Clientes
            'customers.index',
            'customers.create',
            'customers.edit',
            'customers.delete',

            // Proveedores
            'suppliers.index',
            'suppliers.create',
            'suppliers.edit',
            'suppliers.delete',

            // Compras
            'purchases.index',
            'purchases.create',
            'purchases.edit',
            'purchases.delete',

            // Ventas
            'sales.index',
            'sales.create',
            'sales.edit',
            'sales.delete',
        ];

        foreach ($permissions as $permission) {
            Permission::firstOrCreate([
                'name' => $permission,
                'guard_name' => 'web'
            ]);
        }

        $admin = Role::firstOrCreate([
            'name' => 'Administrador',
            'guard_name' => 'web'
        ]);

        $gerente = Role::firstOrCreate([
            'name' => 'Gerente',
            'guard_name' => 'web'
        ]);

        $vendedor = Role::firstOrCreate([
            'name' => 'Vendedor',
            'guard_name' => 'web'
        ]);

        $bodeguero = Role::firstOrCreate([
            'name' => 'Bodeguero',
            'guard_name' => 'web'
        ]);

        // Administrador tiene todos los permisos
        $admin->syncPermissions(Permission::all());
    }
}
