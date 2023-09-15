<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Transaction extends Model
{
    use HasFactory;

    protected $fillable = [
        'Rekeningnummer',
        'Muntsoort',
        'Transactiedatum',
        'Rentedatum',
        'Beginsaldo',
        'Eindsaldo',
        'Transactiebedrag',
        'Omschrijving',
    ];
}
