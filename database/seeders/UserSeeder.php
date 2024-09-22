<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Foundation\Auth\User;

class UserSeeder extends Seeder
{
    public function run(): void
    {
        User::create([
            "id" => 1,
            "primer_nombre" => "Admin",
            "segundo_nombre" => "Admin",
            "paterno" => "Admin",
            "materno" => "Admin",
            "espacialidad" => "Admin",
            "fecha_nacimiento" => "2021-10-01",
            "genero" => "masculino",
            "numero" => "123456789",
            "estado" => true,
            "email" => "admin@admin.com",
            "user" => "admin",
            "password" => bcrypt("sample")
        ]);
    }
}
