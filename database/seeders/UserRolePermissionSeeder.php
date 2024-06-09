<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;

class UserRolePermissionSeeder extends Seeder
{
    /**
     * @return void
     */

    public function run()
    {
        $default_user_value=[
        'email_verified_at' => now(),
        'password' => Hash::make('password'),
        'remember_token' => Str::random(10),
    ];

        $administrator=User::create(array_merge([
            'email' => 'administrator@gmail.com',
            'name' => 'administrator',
        ],$default_user_value));

        $customer=User::create(array_merge([
            'email' => 'customer@gmail.com',
            'name' => 'customer',
        ],$default_user_value));

        $technician=User::create(array_merge([
            'email' => 'technician@gmail.com',
            'name' => 'technician',
        ],$default_user_value));
        $it=User::create(array_merge([
            'email' => 'it@gmail.com',
            'name' => 'it',
        ],$default_user_value));
        $role_administrator=Role::create(['name'=> 'administrator']);
        $role_customer=Role::create(['name'=> 'customer']);
        $role_technician=Role::create(['name'=> 'technician']);
        $role_it=Role::create(['name'=> 'it']);


        $permissions = [
            'create user',
            'edit user',
            'delete user',
            'read user',
            // tambahkan izin lainnya sesuai kebutuhan
        ];


        $administrator->assignRole($role_administrator);
        $customer->assignRole($role_customer);
        $technician->assignRole($role_technician);
        $it->assignRole($role_it);

    }

  }
