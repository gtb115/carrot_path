<?php

namespace App;

use Illuminate\Database\Eloquent\Model as Eloquent;
// by doing this extend any further model to "model"
class Model extends Eloquent
{
    // guarded is the opposite of $fillable.  guarded blocks items, so if its empty it blocks nothing.
    $guarded = [];
}
