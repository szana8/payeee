<?php
namespace szana8\PayEEE\Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use szana8\PayEEE\Models\PaymentProvider;


class PaymentProviderFactory extends Factory
{
    protected $model = PaymentProvider::class;

    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'name' => $this->faker->name,
            'credentials' => json_encode(['username', 'password']),
            'icon' => $this->faker->url,
        ];
    }
}
