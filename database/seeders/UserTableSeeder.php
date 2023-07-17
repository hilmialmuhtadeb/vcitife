<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;

class UserTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $user = collect([
            [
                'name' => 'Admin V-Citife',
                'email' => 'admin@vcitife.com',
                'username' => 'adminvcitife',
                'isAdmin' => '1',
                'password' => bcrypt('admin')
            ], [
                'name' => 'Hilmi Almuhtade',
                'email' => 'hilmialmuhtadeb@gmail.com',
                'username' => 'hilmialmuhtadeb',
                'isAdmin' => '0',
                'password' => bcrypt('akunhilmiasli123')
            ]
        ]);
        $user->each(function ($c) {
            User::create([
                'name' => $c['name'],
                'email' => $c['email'],
                'username' => $c['username'],
                'isAdmin' => $c['isAdmin'],
                'password' => $c['password']
            ]);
        });
    }
}
