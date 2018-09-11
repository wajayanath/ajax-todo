<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Item extends Model
{
   public $table = 'Items'; // overcome ajax 500
}
