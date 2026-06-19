<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Company;

class CompanySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Company::firstOrCreate(['id' => 1], [
            'name' => 'Empresa de Prueba',
            'business_name' => 'Nombre Comercial',
            'nit' => '123456789',
            'dv' => '0',
            'email' => 'info@empresadeprueba.com',
            'phone' => '555-1234',
            'mobile' => '555-5678',
            'address' => 'Calle Principal 123',
            'city' => 'Ciudad de Prueba',
            'department' => 'Departamento de Prueba',
            'logo' => null,
            'invoice_prefix' => 'FV',
            'invoice_consecutive' => 1,
            'tax_percentage' => 19.00,
            'status' => true,
        ]);
    }
}
