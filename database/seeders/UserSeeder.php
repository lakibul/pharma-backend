<?php

namespace Database\Seeders;

use App\Models\User;
use Carbon\Carbon;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use Spatie\Permission\Models\Role;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Ensure the admin role exists
        if (!Role::where('name', 'admin')->exists()) {
            Role::create(['name' => 'admin']);
        }

        // Check if a super admin exists with id 1
        $superAdmin = User::where('id', 1)->first();

        if (!$superAdmin) {
            // Create the Super Admin user
            $superAdmin = User::create([
                'id' => 1,
                'name' => 'Super Admin',
                'email' => 'admin@admin.com',
                'email_verified_at' => Carbon::now(),
                'password' => Hash::make('12345678'),
                'set_password' => '12345678',
                'is_admin' => 1,
            ]);

            // Assign the 'admin' role to this super admin
            $superAdmin->assignRole('admin');
        }
    }
}
