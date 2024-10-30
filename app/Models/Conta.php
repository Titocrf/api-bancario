<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Conta extends Model
{
    use HasFactory;
    use SoftDeletes;

    protected $table = 'conta';

    protected $fillable = [
        'numero_conta',
        'saldo'
    ];

    public $timestamps = true;
}
