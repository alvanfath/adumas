<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class LogPetugas extends Model
{
    use HasFactory;
    protected $table = 'log_petugas';
    protected $fillable = ['id_petugas', 'activity'];

    public function petugas(){
        return $this->belongsTo(Admin::class, 'id_petugas', 'id_petugas');
    }
}
