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

    public $timestamps = false;

    // Relasi ke BidangKeahlian
    public function bidangKeahlian()
    {
        return $this->belongsTo(BidangKeahlian::class, 'id_bidang_keahlian');
    }
    public function konsentrasiKeahlian()
    {
        return $this->hasMany(konsentrasiKeahlian::class, 'id_konsentrasi_keahlian', 'id_konsentrasi_keahlian');
    }
}
