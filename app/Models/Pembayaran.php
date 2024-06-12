<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pembayaran extends Model
{
    protected $table = 'pembayaran';
    use HasFactory;

    protected $fillable = [
        'Invoice_ID', 'user_id', 'paket_data', 'ss_pembayaran', 'status'
    ];

    protected $casts = [
        'paket_data' => 'array', // Mengubah kolom JSON menjadi array
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
