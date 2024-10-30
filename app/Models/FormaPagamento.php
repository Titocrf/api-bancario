<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class FormaPagamento extends Model
{
    use HasFactory;
    use SoftDeletes;

    protected $table = 'forma_pagamento';

    protected $fillable = [
        'taxa'
    ];

    public $timestamps = true;
}
