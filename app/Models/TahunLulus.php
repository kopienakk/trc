<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TahunLulus extends Model
{
    use HasFactory;

    // Nama tabel
    protected $table = 'tbl_tahun_lulus';

    // Primary key
    protected $primaryKey = 'id_tahun_lulus';

    // Kolom yang dapat diisi
    protected $fillable = [
        'tahun_lulus',
        'keterangan',
    ];
    public function alumni()
    {
        return $this->hasMany(Alumni::class, 'id_tahun_lulus', 'id_tahun_lulus');
    }

    public $timestamps = false;
}
