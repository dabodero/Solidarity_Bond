<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Image extends Model
{
    protected $table = 'produits';

    protected $primaryKey = 'ID';

    public $timestamps = false;

    protected $fillable = ['Nom', 'CheminAcces', 'Page'];

}
