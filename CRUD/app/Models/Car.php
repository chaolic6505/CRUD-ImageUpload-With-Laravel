<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Car extends Model
{
    use HasFactory;

    protected $table = 'cars';

    protected $primaryKey = 'id';

    protected $fillable = ['name', 'founded', 'description','image_path'];

    public function carmodels()
    {
        return $this->hasMany(CarModel::class);
    }

    public  function headquater()
    {
        return $this->hasOne(Headquater::class);
    }
    //Define a many through relationship
    public function engines()
    {
        return $this->hasManyThrough(
            Engine::class,
            CarModel::class,
            'car_id',
            'model_id'
        );
    }

    //Define a has one through relationship

    public function productionDate()
    {
        return $this->hasOneThrough(
            CarProductionDate::class,
            CarModel::class,
            'car_id',
            'model_id'
        );
    }

    public function products()
    {
        return $this->belongsToMany(
            Product::class
        );
    }
}
