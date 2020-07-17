<?php


namespace App\Http\Controllers\Api;


use App\Ingredient;

class IngredientsController
{
    /**
     * @return mixed
     */
    public function index()
    {
        return Ingredient::all();
    }
}
