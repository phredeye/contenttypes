<?php
namespace Modules\ContentTypes\Database\factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class ContentNodeFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = \Modules\ContentTypes\Models\ContentNode::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            "title" => $this->faker->words(rand(2,5), true),
            "content" => $this->faker->paragraphs(rand(1,4), true),
        ];
    }
}

