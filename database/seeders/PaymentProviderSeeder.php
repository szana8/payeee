<?php
namespace Database\Seeders;

use Illuminate\Database\Seeder;
use szana8\PayEEE\Models\PaymentProvider;

class PaymentProviderSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        PaymentProvider::factory(10)->create();
    }
}
