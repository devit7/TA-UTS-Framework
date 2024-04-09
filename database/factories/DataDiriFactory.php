<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\DataDiri>
 */
class DataDiriFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            //
            'nim'=>fake()->unique()->numerify('##############'),
            'nama'=>fake()->name(),
            'alamat'=>fake()->address(),
            'email'=>fake()->unique()->safeEmail(),
            'no_hp'=>fake()->unique()->numerify('08##########'),
            'jurusan'=>fake()->randomElement(['Teknik Informatika','Teknik Elektro','Teknik Industri','Teknik Sipil']),
            'img_path'=>'http://img-host-by-dev.vercel.app/img/ayangKu/424905635_18410917897031145_1822307842112363369_n.jpg',
        ];
    }
}
