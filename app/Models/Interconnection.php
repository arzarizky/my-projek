<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Interconnection extends Model
{
    use HasFactory;

    protected $table = 'interconnections';

    public function Names()
    {
        return $this->hasMany(Name::class, 'interconnection_id');
    }
}
