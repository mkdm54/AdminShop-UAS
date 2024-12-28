<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\User;

class AdminSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        User::updateOrCreate(['id' =>  '1'], [
            'username' => 'admin',
            'name' => 'admin',
            'email' => 'makdumibrohim@gmail.com',
            'password' => bcrypt('admin1234'),
            'role' => 'admin',
            'email_verified_at' => now(),
        ]);

        User::where('id', '1')->update(['username' => 'admin']);
    }
}
