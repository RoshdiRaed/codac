<?php
namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Spatie\Permission\Models\Role;


class SuperAdminsSeeder extends Seeder
{
    public function run()
    {

        $role = Role::firstOrCreate(['name' => 'super-admin']);

        $admins = [
            [
                'name' => 'Roshdi',
                'email' => 'roshdi013@gmail.com',
                'password' => 'ros60pro100sam',
            ],
            [
                'name' => 'Raed',
                'email' => 'raed@gmail.com',
                'password' => 'ros60pro100sam',
            ],
        ];

        foreach ($admins as $adminData) {
            $user = User::updateOrCreate(
                ['email' => $adminData['email']],
                [
                    'name' => $adminData['name'],
                    'password' => Hash::make($adminData['password']),
                    'email_verified_at' => now(),
                ]
            );

            $user->assignRole($role);
        }
    }
}
