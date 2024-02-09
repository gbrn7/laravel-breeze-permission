<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $admin = User::create([
            'name'=>'admin',
            'username'=>'admin',
            'email'=>'muhammadrayhangibran@gmail.com',
            'password'=>bcrypt('12345678'),
        ]);

        $admin->assignRole('admin');

        $penulis = User::create([
            'name'=>'penulis',
            'username'=>'penulis',
            'email'=>'rayhan.gibran19@gmail.com',
            'password'=>bcrypt('12345678'),
        ]);
        
        $penulis->assignRole('penulis');
    }
}
