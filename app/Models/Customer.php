<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Customer extends Model
{
    protected $table = 'customers';
    use HasFactory;
    protected $guarded = [];
    protected $fillable = [
        'device_id',
        'name',
        // tambahkan kolom lain yang diperlukan
    ];

    public function dataSensors()
    {
        return $this->hasMany(DataSensor::class, 'device_id', 'devices_id');
    }

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id', 'id');
    }
    public function device()
    {
        return $this->belongsTo(Device::class, 'device_id');
    }

}
