<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BidangKeahlian extends Model
{
    use HasFactory;

    // Nama tabel
    protected $table = 'tbl_bidang_keahlian';

    // Primary key
    protected $primaryKey = 'id_bidang_keahlian';

    // Kolom yang dapat diisi
    protected $fillable = [
        'kode_bidang_keahlian',
        'bidang_keahlian',
    ];

    public function programKeahlian()
    {
        return $this->hasMany(ProgramKeahlian::class, 'id_bidang_keahlian', 'id_bidang_keahlian');
    }
    // Jika tabel tidak menggunakan timestamp (created_at, updated_at)
    public $timestamps = false;
}
