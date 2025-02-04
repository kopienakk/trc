<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Sekolah extends Model
{
    use HasFactory;

    // Nama tabel
    protected $table = 'tbl_sekolah';

    // Primary key
    protected $primaryKey = 'id';

    // Kolom yang dapat diisi
    protected $fillable = [
        'kode_sekolah',
        'nama_sekolah',
        'alamat',
    ];

    public $timestamps = false;
}
