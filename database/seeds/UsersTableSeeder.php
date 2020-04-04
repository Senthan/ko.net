<?php

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
        DB::table('users')->insert([
            [
            'name' => 'SYSADMIN',
            'email' => 'sysadmin@admin.com',
            'password' => bcrypt('Senthan2020#111'),
            'created_at' => \Carbon\Carbon::now()
            ]

        ]);
    }
}
