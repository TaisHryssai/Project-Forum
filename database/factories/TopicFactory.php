<?php

namespace Database\Factories;

use App\Models\Topic;
use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\User;
use Illuminate\Http\UploadedFile;

class TopicFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Topic::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
             'title' => $this->faker->name,
             'content' => $this->faker->paragraph,
             'keywords' => json_encode([
              $this->faker->randomElement(['linux', 'windows', 'Web'])]),
             'attachments' => json_encode([
             UploadedFile::fake()->image('avatar.png')]),
             'user_id' => User::factory(),
        ];
    }
}
