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
        /**
         * Truncate users and users_roles tables
         */
        DB::table("users") -> truncate();
        DB::table("users_roles") -> truncate();

        /**
         * Seed users db with test users on both roles
         */
        DB::table("users") -> insert([
            "name" => "Administrator",
            "email" => "admin@app.com",
            "password" => \Hash::make("admin")
        ]);

        DB::table("users") -> insert([
            "name" => "Client 1",
            "email" => "client1@app.com",
            "password" => \Hash::make("client1")
        ]);

        DB::table("users") -> insert([
            "name" => "Client 2",
            "email" => "client2@app.com",
            "password" => \Hash::make("client2")
        ]);

        /**
         * Users roles seed
         */
        DB::table("users_roles") -> insert([
            "user_id" => 1,
            "role_id" => 1
        ]);

        DB::table("users_roles") -> insert([
            "user_id" => 2,
            "role_id" => 2
        ]);

        DB::table("users_roles") -> insert([
            "user_id" => 3,
            "role_id" => 2
        ]);
    }
}
