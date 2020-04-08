<?php

namespace SKE\Posts\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;
use SKE\Components\Models\Component;
use SKE\Users\Models\User;

class Post extends Model
{

    protected $with = ['components','author'];

    public function components()
    {
        return $this->hasMany(Component::class);
    }

    public function author()
    {
        return $this->belongsTo(User::class);
    }

    public function setTitleAttribute($value)
    {
        $this->attributes['title'] = $value;

        $this->attributes['slug'] = Str::slug($value,'-');
    }
}
