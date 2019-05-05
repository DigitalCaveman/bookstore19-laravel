<?php

use App\User;
use Illuminate\Database\Seeder;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $user = new App\User;
        $user->first_name = 'Jakob';
        $user->last_name = 'Bechinie';
        $user->adress = 'Lainzerstraße 130/7 1130 Wien';
        $user->country = 'Austria';
        $user->is_admin = '0';
        $user->email = 'jbechinie@gmail.com';
        $user->password = bcrypt('secret');
        $user->save();

        $user3 = new App\User;
        $user3->first_name = 'Kilian';
        $user3->last_name = 'Bechinie';
        $user3->adress = 'Lainzerstraße 130/7 1130 Wien';
        $user3->country = 'Austria';
        $user3->is_admin = '0';
        $user3->email = 'kbechinie@gmail.com';
        $user3->password = bcrypt('secret');
        $user3->save();

        $user2 = new App\User;
        $user2->first_name = 'Mister';
        $user2->last_name = 'Admin';
        $user2->adress = 'Droopweg 17 20537 Hamburg';
        $user2->country = 'Germany';
        $user2->is_admin = '1';
        $user2->email = 'test1@gmail.com';
        $user2->password = bcrypt('admin');
        $user2->save();
    }
}
