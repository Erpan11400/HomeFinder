<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\User;

class PropertyFactory extends Factory
{
    public function definition(): array
    {
        $city = $this->faker->randomElement([
            'Jakarta', 'Bandung', 'Surabaya', 'Medan', 'Yogyakarta',
            'Bali', 'Semarang', 'Makassar', 'Palembang'
        ]);

        $country = "Indonesia";

        $length = $this->faker->numberBetween(5, 15);
        $width  = $this->faker->numberBetween(5, 15);

        return [
            'user_id'   => User::inRandomOrder()->first()->id ?? User::factory(),
            'photo' => $this->faker->randomElement([
                "https://images.pexels.com/photos/106399/pexels-photo-106399.jpeg",
                "https://images.pexels.com/photos/164558/pexels-photo-164558.jpeg",
                "https://images.pexels.com/photos/259588/pexels-photo-259588.jpeg",
                "https://images.pexels.com/photos/280222/pexels-photo-280222.jpeg",
                "https://images.pexels.com/photos/323780/pexels-photo-323780.jpeg",
                "https://images.pexels.com/photos/276724/pexels-photo-276724.jpeg",
                "https://images.pexels.com/photos/186077/pexels-photo-186077.jpeg",
                "https://images.pexels.com/photos/1396122/pexels-photo-1396122.jpeg",
                "https://images.pexels.com/photos/259950/pexels-photo-259950.jpeg",
                "https://images.pexels.com/photos/106399/pexels-photo-106399.jpeg",
            ]),





            'title'     => $this->faker->sentence(3),
            'summary'   => $this->faker->paragraph(3),
            'price'     => $this->faker->numberBetween(250000000, 5000000000),
            'city'      => $city,
            'state'     => $this->faker->state(),
            'country'   => $country,
            'bed_room'  => $this->faker->numberBetween(1, 6),
            'bath_room' => $this->faker->numberBetween(1, 4),
            'area_l'    => $length,
            'area_w'    => $width,
                'area_total'=> $length * $width,
        ];
    }
}
