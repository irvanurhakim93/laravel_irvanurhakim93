<?php

namespace Database\Seeders;

use Carbon\Carbon;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Faker\Factory as Faker;

class pasienSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        $faker = Faker::create('id_ID');

        DB::table('pasien')->insert([
            'nama_pasien' => $faker->name,
            'alamat' => $faker->address,
            'no_telpon' => $faker->phoneNumber,
            'id_rumah_sakit' => $faker->randomDigit(2),
            'created_at' => Carbon::now(),
        ]);
    }
}
