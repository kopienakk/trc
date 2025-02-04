<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class AlumniAuth extends Authenticatable
{
    use HasFactory, Notifiable;

    protected $table = 'tbl_alumni';
    protected $primaryKey = 'id_alumni';
    public $timestamps = false;

    protected $fillable = [
        'id_tahun_lulus',
        'id_konsentrasi_keahlian',
        'id_status_alumni',
        'nisn',
        'nik',
        'nama_depan',
        'nama_belakang',
        'jenis_kelamin',
        'tempat_lahir',
        'tgl_lahir',
        'alamat',
        'no_hp',
        'akun_fb',
        'akun_ig',
        'akun_tiktok',
        'email',
        'password',
    ];


    public function program()
    {
        return $this->belongsTo(KonsentrasiKeahlian::class, 'program_keahlian_id');
    }

    public function status()
    {
        return $this->belongsTo(StatusAlumni::class, 'status_alumni_id');
    }

    public function tahun()
    {
        return $this->belongsTo(TahunLulus::class, 'id_tahun_lulus');
    }

    protected $hidden = [
        'password',
    ];
}
