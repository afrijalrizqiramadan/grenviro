<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class HistorySensor extends Model
{
    use HasFactory;
    protected $fillable = [
        'device',
        'timestamp',
        'pressure',
        'temperature',
    ];
}