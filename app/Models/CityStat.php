<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CityStat extends Model
{
    use HasFactory;
    protected $primaryKey = 'id';
    protected $table = 'cities_ads_stats';
    public $timestamps = false;
    public function comments()
    {
        return $this->hasMany(Comments::class);
    }
}
