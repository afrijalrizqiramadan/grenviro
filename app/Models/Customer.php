<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Customer extends Model
{
    use HasFactory;
    protected $guarded = [];

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id', 'id');
    }
    public function device()
    {
        return $this->belongsTo(Device::class, 'device_id');
    }

    public function getImage()
    {
        if (substr($this->images, 0, 5) == "https") {
            return $this->images;
        }

        if ($this->images) {
            return asset('assets/images/customer/' . $this->images);
        }

        return 'https://via.placeholder.com/500x500.png?text=No+Cover';
    }
}
