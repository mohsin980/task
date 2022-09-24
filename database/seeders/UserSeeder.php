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
        $email = 'admin@gmail.com';
        $user = User::where('email', $email)->first();
        if(empty($user)){
            $user = new User;
            $user->name = 'Admin';
            $user->email = $email;
            $user->password = Hash::make('Password@1');
            $user->save();
        }
        return 'Seeder Successfully executed..!';
    }
}
