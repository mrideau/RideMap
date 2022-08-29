<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Skatepark>
 */
class SkateparkFactory extends Factory
{
    function rand_float($st_num=0,$end_num=1,$mul=1000000) // 1000000
    {
        if ($st_num>$end_num) return false;
        return mt_rand($st_num*$mul,$end_num*$mul)/$mul;
    }

    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'title' => $this->faker->jobTitle(),
            'slug' => $this->faker->slug(),
            'description' => $this->faker->paragraph(3),
            'address' => $this->faker->address(),
            'city' => $this->faker->city(),
            'postcode' => strval($this->faker->numberBetween(11111, 99999)),
            'coordinates' => strval($this->rand_float(47.5546492, 48.4085349)) . ',' . strval($this->rand_float(1.833962, 2.8344711))
//            'coordinates' => strval($this->rand_float(47.554, 48.408)) . ',' . strval($this->rand_float(1.833, 2.834))
        ];
    }
}
