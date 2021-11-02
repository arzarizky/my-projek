<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Time extends Model
{
    use HasFactory;

    protected $table = 'times';

    public function Databases()
    {
        return $this->hasMany(Database::class, 'time_id');
    }

    public function Networks()
    {
        return $this->hasMany(Network::class, 'time_id');
    }

    public function Alpros()
    {
        return $this->hasMany(Alpro::class, 'time_id');
    }
}
