<?php

use Illuminate\Database\Seeder;
use App\Ingredient;

class IngredientsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $ingredients = [
            ['tomato', 0.5],
            ['sliced mushrooms', 0.5],
            ['feta cheese', 1.0],
            ['sausages', 1.0],
            ['sliced onion', 0.5],
            ['mozzarella cheese', 0.3],
            ['oregano ', 2.0],
            ['bacon', 1.0],
            ['tomato', 0.5],
        ];

        foreach ($ingredients as $key => $value) {
            Ingredient::create([
                'name' => $value[0],
                'price' => $value[1]
            ]);
        }
    }
}
