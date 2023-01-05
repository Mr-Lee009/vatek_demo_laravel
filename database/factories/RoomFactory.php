<?php

namespace Database\Factories;

use App\Models\Hotel;
use App\Models\Room;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Room>
 */
class RoomFactory extends Factory
{

    protected $model = Room::class;

    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        $type = $this->faker->randomElement(['luxury', 'normal', 'vip']);
        $numberRoom = $this->faker->randomElement(['1101', '1102', '1103', '1104', '1105', '1106', '1107', '1108', '1109']);
        $desciption = ($type == 'vip') ? "phong VIP" : "ko phuc vu";

        return [
            "HOTEL_ID" => Hotel::factory(),
            "NAME_ROOM" => $numberRoom,
            "TYPE_ROOM" => $type,
            "DESCRIPTION" => $desciption
        ];
    }
}
