<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use App\Models\User;
class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        User::factory(9)->create();

            User::factory()->create([
            'name' => 'Admin OnlineShop',
            'email' => 'adminonlineshop@fic12.com',
            'password' => Hash::make('admin123'),
            'phone'=> '0123456789',
            'roles' => 'ADMIN',

        ]);
    }
}