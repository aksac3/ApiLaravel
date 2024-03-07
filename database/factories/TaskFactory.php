<?php

namespace Database\Factories;

use App\Models\Task;
use Illuminate\Database\Eloquent\Factories\Factory;

class TaskFactory extends Factory
{
    protected $model = Task::class;

    public function definition()
    {
        return [
            'name' => $this->faker->sentence,
            'description' => $this->faker->paragraph,
            'user_id' => \App\Models\User::factory(), 
            'company_id' => \App\Models\Company::factory(), 
            'is_completed' => $this->faker->boolean,
            'start_at' => $this->faker->dateTimeThisYear,
            'expired_at' => $this->faker->dateTimeThisYear,
        ];
    }
}
