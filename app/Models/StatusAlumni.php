<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class StatusAlumni extends Model
{
    use HasFactory;

    // Nama tabel
    protected $table = 'tbl_status_alumni';

    // Primary key
    protected $primaryKey = 'id';

    // Kolom yang dapat diisi
    protected $fillable = [
        'kode_status',
        'status',
    ];

    public $timestamps = false;
}
