<?php

namespace Database\Factories;

use App\Models\Volume;
use Illuminate\Database\Eloquent\Factories\Factory;

class VolumeFactory extends Factory
{
    protected $model = Volume::class;

    public function definition() : array
    {
        return [
            'release_year' => $this->faker->year(),
            'description' => $this->faker->paragraph()
        ];
    }
}
