<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // $this->call(UserSeeder::class);
        // 作成したMembersTableSeederをDatabaseSeederに登録
        $this->call(MembersTableSeeder::class);
    }
}