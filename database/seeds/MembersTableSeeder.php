<?php

use Illuminate\Database\Seeder;

class MembersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
      // insert()→データベースにデータを追加する
      
        for ($i = 1; $i < 10; $i++) {
            DB::table('members')->insert([
              'name' => 'User-' . $i,
              'telephone' => 'User-' . $i,
              'email' => 'user-' . $i . '@example.com',
              'created_at'=>now(),
              'updated_at'=>now(),
          ]);
        }
    }
}