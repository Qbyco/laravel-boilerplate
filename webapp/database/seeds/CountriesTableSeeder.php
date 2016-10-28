<?php

use Illuminate\Database\Seeder;

class CountriesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //Truncate table
        DB::table("countries") -> truncate();

        //Get countries SQL
        $countriesFile = file_get_contents(__DIR__  . '/country-list.sql');

        //Split into SQL statements
        $queries = array_filter(array_map('trim', explode(';', $countriesFile)));

        foreach ($queries as $query) {
            DB::statement($query);
            usleep(500);
        }
    }
}
