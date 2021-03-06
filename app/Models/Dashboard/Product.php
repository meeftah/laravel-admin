<?php

namespace App\Models\Dashboard;

use GoldSpecDigital\LaravelEloquentUUID\Database\Eloquent\Model;

class Product extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name',
        'detail'
    ];
}
