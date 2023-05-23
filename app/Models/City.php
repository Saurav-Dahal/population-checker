<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class City extends Model
{
    use HasFactory;

    protected $table = 'cities';

    protected $fillable = [
        'country_id',
        'name'
    ];

    public function country_inf()
    {
        return $this->belongsTo(country::class,'country_id','id');
    }
}
