<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Spatie\Permission\Models\Role;

class PenggunaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
       
        // Create the user
        $pengguna = User::create([
            'username' => 'test',
            'name' => 'Administrator',
            'email' => 'hh@cumangitu.com',
            'password' => Hash::make('admin'),
            'address' => 'test89789',
            'phone' => '081789789789',
            'status' => 'ACTIVE'
        ]);

        // Assign the role to the user
        $pengguna->assignRole('admin');

        $this->command->info('User Admin berhasil diinsert');
    }
}
