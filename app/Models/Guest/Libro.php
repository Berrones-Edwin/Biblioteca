<?php

namespace App\Models\Guest;

use Illuminate\Database\Eloquent\Model;

class Libro extends Model
{
    //

    protected $table ="libro";
    protected $fillable = ['titulo','isbn','autor','cantidad','editorial','foto'];
}
