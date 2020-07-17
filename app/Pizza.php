<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Pizza extends Model
{
    protected $fillable = ['name', 'price'];

    protected $appends = ['price'];

    public function ingredients()
    {
        return $this->belongsToMany(Ingredient::class);
    }

    public function getPriceAttribute()
    {
        $price = 0;

        foreach ($this->ingredients()->get() as $ingredient) {
            $price += $ingredient->price;
        }

        $price += $price * 0.5;

        return $price;
    }
}
