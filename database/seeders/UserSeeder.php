<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Filament\Commands\MakeUserCommand as FilamentMakeUserCommand;
use Illuminate\Support\Facades\Hash;


class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // User::factory()->count(100)->create();

        $filamentMakeUserCommand = new FilamentMakeUserCommand();
        $reflector = new \ReflectionObject($filamentMakeUserCommand);
        $getUserModel = $reflector->getMethod('getUserModel');
        $getUserModel->setAccessible(true);
        $getUserModel->invoke($filamentMakeUserCommand)::create([
            'name' => 'Super Admin',
            'username' => 'admin',
            'email' => 'admin@example.su',
            'birth_date' => '1990-01-01',
            'phone' => '+998901112233',
            'role' => 'admin',
            'status' => 'active',
            'address' => json_encode([
                'country' => 'Uzbekistan',
                'city' => 'Tashkent',
            ]),
            'is_verified' => true,
            'password' => Hash::make('admin12345'),
        ]);
    }
}
