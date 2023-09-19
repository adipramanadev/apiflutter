<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Crud;

class CrudSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //
        $crud = [
            [
                'nameproduct' => 'Laptop',
                'price' => 2000000
            ],
            [
                'nameproduct' => 'Handphone',
                'price' => 100000
            ],
            [
                'nameproduct' => 'Sepatu',
                'price' => 50000
            ]
        ];

        foreach ($crud as $key) {
            Crud::create($key);
        }
    }
}
