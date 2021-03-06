<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // $this->call(UsersTableSeeder::class);
        $this->call(adminSeeder::class);
        $this->call(dosenSeeder::class);
        $this->call(fakultasSeeder::class);
        $this->call(jurusanSeeder::class);
        $this->call(mahasiswaSeeder::class);
        $this->call(makulSeeder::class);
        $this->call(krsSeeder::class);
        $this->call(ruangSeeder::class);
        $this->call(kelasSeeder::class);
        $this->call(hariSeeder::class);
        $this->call(jamSeeder::class);
        $this->call(jadwalSeeder::class);
    }
}
