<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class IpAddress extends Model
{
    use HasFactory;

    protected $table = 'ip_addresses';

    public function HostnameAlpros()
    {
        return $this->hasMany(HostnameAlpro::class, 'ip_address_id');
    }
}
