<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\PizzaRequest;
use App\Ingredient;
use App\Pizza;

class PizzaController extends Controller
{
    /**
     * @param PizzaRequest $request
     * @return mixed
     */
    public function store(PizzaRequest $request)
    {
        $input = $request->all();

        $pizzaName = $input['name'];
        $ingredients = $input['ingredients'];

        $pizza = Pizza::create(['name' => $pizzaName]);

        foreach ($ingredients as $ingredient_id) {
            $ingredient = Ingredient::find($ingredient_id);
            $pizza->ingredients()->attach($ingredient);
        }

        return $pizza;
    }

    /**
     * @return mixed
     */
    public function index()
    {
        return Pizza::with('ingredients')->paginate(10);
    }

    public function getIngredients()
    {
        return Ingredient::all();
    }

    /**
     * @param Pizza $pizza
     * @return mixed
     */
    public function show(Pizza $pizza)
    {
        return $pizza->with('ingredients')->first();
    }

    /**
     * @param Pizza $pizza
     * @param PizzaRequest $request
     * @return mixed
     */
    public function update(Pizza $pizza, PizzaRequest $request)
    {
        $input = $request->all();

        $pizzaName = $input['name'];
        $ingredients = $input['ingredients'];

        $pizza = Pizza::where('id', $pizza->id)->with('ingredients')->first();

        $pizza->update(['name' => $pizzaName]);

        foreach ($pizza->ingredients as $elem) {
            $pizza->ingredients()->detach($elem);
        }

        foreach ($ingredients as $ingredient_id) {
            $ingredient = Ingredient::find($ingredient_id);
            $pizza->ingredients()->attach($ingredient);
        }

        $pizza->save();

        return $pizza;
    }
}
