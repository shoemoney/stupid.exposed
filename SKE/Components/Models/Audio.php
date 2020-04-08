<?php

namespace SKE\Components\Models;

use Illuminate\Database\Eloquent\Model;

class Audio extends Model
{
    public function components()
    {
        return $this->morphMany(Component::class,'postable');
    }
}
