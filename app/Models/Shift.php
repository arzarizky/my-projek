<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Shift extends Model
{
    use HasFactory;

    protected $table = 'shifts';
    
    public function Databases()
    {
        return $this->hasMany(Database::class, 'shift_id');
    }

    public function Alpros()
    {
        return $this->hasMany(Alpro::class, 'shift_id');
    }

    public function Networks()
    {
        return $this->hasMany(Network::class, 'shift_id');
    }

    public function Securities()
    {
        return $this->hasMany(Security::class, 'shift_id');
    }
}
