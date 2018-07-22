<?php

use Illuminate\Database\Seeder;

class UserTableSeeder extends Seeder
{
    //password=secret

    const DATA = [
        [
            'name' => 'Serhii',
            'email' => 'serega_mu_fun@ukr.net',
            'is_admin' => true,
            'password' => '$2y$10$TKh8H1.PfQx37YgCzwiKb.KjNyWgaHb9cbcoQgdIVFlYg7B77UdFm',
            'remember_token' => '1234'
        ],
        [
            'name' => 'Oleg',
            'email' => 'serhiiplotnikov1934@gmail.com',
            'is_admin' => false,
            'password' => '$2y$10$TKh8H1.PfQx37YgCzwiKb.KjNyWgaHb9cbcoQgdIVFlYg7B77UdFm',
            'remember_token' => '1234'
        ],
        [
            'name' => 'Tatiana',
            'email' => 'tanusha_plotnikova@ukr.net',
            'is_admin' => false,
            'password' => '$2y$10$TKh8H1.PfQx37YgCzwiKb.KjNyWgaHb9cbcoQgdIVFlYg7B77UdFm',
            'remember_token' => '1234'
        ]
    ];

    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        \App\User::query()->insert(self::DATA);
    }
}
