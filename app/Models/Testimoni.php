<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Testimoni extends Model
{
    use HasFactory;

    protected $table = 'tbl_testimoni';
    protected $primaryKey = 'id_testimoni';
    public $timestamps = true;

    protected $fillable = [
        'id_alumni',
        'testimoni',
        'tgl_testimoni',
    ];

    // Relasi ke tbl_alumni
    public function alumni()
    {
        return $this->belongsTo(Alumni::class, 'id_alumni', 'id_alumni');
    }
}
