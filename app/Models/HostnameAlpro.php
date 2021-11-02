<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class HostnameAlpro extends Model
{
    use HasFactory;

    protected $table = 'hostname_alpros';

    public function IpAddress()
    {
        return $this->belongsTo(IpAddress::class);
    }
}
