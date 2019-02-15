<?php

use Illuminate\Database\Seeder;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run(){
        $param = [
          'name' => 'root',
          'email' => 'root@sample.com',
            'password' => 'root',
            'remember_token' => 'aaaaaaa',
        ];

    }
}
