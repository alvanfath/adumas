<?php

namespace Database\Seeders;

use Faker\Factory;
use Illuminate\Support\Arr;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class MasyarakatTempSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = Factory::create('id_ID');

        for ($i=1; $i <= 200; $i++) {
            DB::table('masyarakat_temp')->insert([
                'nik' => $faker->unique()->nik(),
                'nama' => $faker->name(),
                'jenis_kelamin' => Arr::random(['Laki-laki', 'Perempuan']),
                'tempat_lahir' => $faker->cityName(),
                'tanggal_lahir' => $faker->dateTimeThisCentury('-18 years'),
                'alamat' => $faker->address(),
                'agama' => Arr::random(['Islam', 'Khatolik', 'Protestan', 'Budha', 'Hindu', 'Lainnya']),
                'status_perkawinan' => Arr::random(['Kawin', 'Belum Kawin']),
                'pekerjaan' => $faker->jobTitle()
            ]);
        }
    }
}
