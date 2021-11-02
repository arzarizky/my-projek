<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Alpro extends Model
{
    use HasFactory;

    protected $table = 'alpros';
    protected $guarded = [];

    public function Time()
    {
        return $this->belongsTo(Time::class);
    }

    public function Shift()
    {
        return $this->belongsTo(Shift::class);
    }

    public function HostnameAlpro()
    {
        return $this->belongsTo(HostnameAlpro::class);
    }

    public function IpAddress()
    {
        return $this->belongsTo(IpAddress::class);
    }
}
