<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use App\Models\User;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $admin = User::create([
            'full_name' => 'Administrator',
            'email' => 'admin@app.com',
            'mobile' => '18271287',
            'password' => Hash::make('12345678'),
        ]);
        $customer = User::create([
            'full_name' => 'I am customer',
            'email' => 'customer@app.com',
            'mobile' => '18271287',
            'password' => Hash::make('12345678'),
        ]);
        $entry = User::create([
            'full_name' => 'I am data entry',
            'email' => 'entry@app.com',
            'mobile' => '18271287',
            'password' => Hash::make('12345678'),
        ]);

        $admin->attachRole('superadministrator');
        $customer->attachRole('customer');
        $entry->attachRole('entry');
    }
}
