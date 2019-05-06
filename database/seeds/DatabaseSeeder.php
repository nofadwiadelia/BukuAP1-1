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
        // $this->call(UsersTableSeeder::class);
        
        $faker = Faker\Factory::create(); //import library faker

        $limit = 20; //batasan berapa banyak data

        for ($i = 0; $i < $limit; $i++) {
            DB::table('buku')->insert([ //mengisi datadi database
                'judul' => $faker->title,
                'penulis' => $faker->name,
                'tahun' => $faker->year,
                'penerbit' => $faker->name,
                'kategori' => $faker->name,
            ]);
        }
    }
}
