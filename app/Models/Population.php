<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Population extends Model
{
    use HasFactory;

    protected $table = 'populations';

    protected $fillable = [
        'country_id',
        'city_id',
        'gender_id',
        'old',
        'young',
        'child'
    ];

    public function country_inf()
    {
        return $this->belongsTo(country::class,'country_id','id');
    }

    public function city_inf()
    {
        return $this->belongsTo(city::class,'city_id','id');
    }

    public function gender_inf()
    {
        return $this->belongsTo(gender::class,'gender_id','id');
    }
}
