<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Image extends Model
{
    protected $table = 'images';

    protected $primaryKey = 'ID';

    public $timestamps = false;

    protected $fillable = ['Nom', 'CheminAcces', 'Page'];

}
