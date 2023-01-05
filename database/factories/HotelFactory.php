<?php

namespace Database\Factories;

use App\Models\Hotel;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Hotel>
 */
class HotelFactory extends Factory
{

    protected $model = Hotel::class;
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        $number = $this->faker->numberBetween(1, 10);

        $type = $this->faker->randomElement([
            'InterContinental Hanoi Landmark72',
            'The Oriental Jade Hotel',
            'Peridot Grand Luxury Boutique Hotel',
            'Sofitel Legend Metropole Hà Nội',
            'Lotte Hotel Hanoi'
        ]);

        return [
            "NAME_HOTEL" => $number." - ".$type ,
            "DESCRIPTION" => $this->faker->address(),
        ];
    }
}
