<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class RoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        // $user = User::create([
        //     "name"=>"Admin",
        //     "email"=>"admin@gmail.com",
        //     "password"=>Hash::make("demo@123"),
        // ]);

       // $user = User::find(1);

       // $user->assignRole(['admin','super-admin']);
        // Role::create(['name' => 'user']);
        // Role::create(['name' => 'admin']);
        // Role::create(['name' => 'super-admin']);
        // Role::create(['name' => 'vendor']);
    }
}
