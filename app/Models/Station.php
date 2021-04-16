<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

use Illuminate\Database\Eloquent\SoftDeletes;


class Station extends Model
{
    use HasFactory, SoftDeletes;
    protected $fillable = [
        'title',
        'city',
        'station_closed',
    ];


}
