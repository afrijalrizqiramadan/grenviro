<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DeliveryStatus extends Model
{
    use HasFactory;
     // Jika nama tabel tidak sesuai dengan penamaan default
     protected $table = 'delivery_status';

     // Tentukan kolom yang bisa diisi
     protected $fillable = ['total', 'delivery_date','status']; // sesuaikan dengan kolom yang ada
     public function customer()
     {
         return $this->belongsTo(Customer::class, 'customer_id', 'id');
     }

     public static function boot()
     {
         parent::boot();

         static::updated(function ($santri) {
             activity()
                 ->causedBy(auth()->id())
                 ->performedOn($santri)
                 ->event('Memperbarui data Santri')
                 ->log("Memperbarui santri {$santri->nama_lengkap}");
         });

         static::created(function ($santri) {
             activity()
                 ->causedBy(auth()->id())
                 ->performedOn($santri)
                 ->event('Menambah Santri')
                 ->log("Menambahakan santri baru {$santri->nama_lengkap}");
         });

         static::deleted(function ($santri) {
             activity()
                 ->causedBy(auth()->id())
                 ->performedOn($santri)
                 ->event('Menghapus data santri')
                 ->log("Menghapus data santri {$santri->nama_lengkap}");
         });
     }
}
