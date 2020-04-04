<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Policy extends Model
{
    protected $fillable = ['name', 'description', 'module_description'];

    public function policyMethods()
    {
        return $this->hasMany(PolicyMethod::class);
    }
}
