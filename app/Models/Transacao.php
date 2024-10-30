<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Transacao extends Model
{
    use HasFactory;
    use SoftDeletes;

    protected $table = 'transacao';

    protected $fillable = [
        'numero_conta',
        'valor',
        'forma_pagamento',
        'taxa'
    ];

    public $timestamps = true;
}
