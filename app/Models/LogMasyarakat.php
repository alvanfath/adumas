<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class LogMasyarakat extends Model
{
    use HasFactory;
    protected $table = 'log_masyarakat';
    protected $fillable = [
        'masyarakat_id',
        'activity'
    ];

    public function masyarakat(){
        return $this->belongsTo(Masyarakat::class, 'masyarakat_id', 'id');
    }
}
