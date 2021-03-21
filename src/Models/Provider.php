<?php

namespace ProviderMan\Models;

use Illuminate\Database\Eloquent\Model;

class Provider extends Model
{
    protected $fillable = ['name', 'class', 'enable', 'order'];
}
