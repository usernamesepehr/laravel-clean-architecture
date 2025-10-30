<?php

namespace Models;

use Illuminate\Database\Eloquent\Model;

class User extends Model {
    protected $guarded = [];

    public $incrementing = false;

    protected $keyType = "string";
}