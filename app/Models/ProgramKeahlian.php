<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProgramKeahlian extends Model
{
    use HasFactory;

    protected $table = 'tbl_program_keahlian'; // Sesuai dengan nama tabel di database
    protected $primaryKey = 'id_program_keahlian'; // Primary key

    protected $fillable = [
        'id_bidang_keahlian',
        'kode_program_keahlian',
        'program_keahlian',
    ];

    // Relasi ke BidangKeahlian
    public function bidangKeahlian()
    {
        return $this->belongsTo(BidangKeahlian::class, 'id_bidang_keahlian');
    }
}
