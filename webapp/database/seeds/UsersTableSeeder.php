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
        DB::table("users") -> truncate();
        DB::table("users_roles") -> truncate();

        DB::table("users") -> insert([
            "name" => "Administrator",
            "email" => "admin@app.ro",
            "password" => \Hash::make("admin")
        ]);

        DB::table("users") -> insert([
            "name" => "Client",
            "email" => "client@app.ro",
            "password" => \Hash::make("client")
        ]);


        DB::table("users_roles") -> insert([
            "user_id" => 1,
            "role_id" => 1
        ]);

        DB::table("users_roles") -> insert([
            "user_id" => 2,
            "role_id" => 2
        ]);
    }
}
