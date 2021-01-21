<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $items = [
            ['name' => 'aksan', 'email' => 'aksan@gmail.com', 'password' => Hash::make('aksan')],
            ['name' => 'patman', 'email' => 'patman@gmail.com', 'password' => Hash::make('patman')],
            ['name' => 'hero', 'email' => 'hero@gmail.com', 'password' => Hash::make('hero')],
        ];

        foreach ($items as $item) {
            # code...
            User::create($item);
        }
    }
}
