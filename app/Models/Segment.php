<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Segment extends Model
{
    use HasFactory;

    protected $table = 'segments';

    public function Incidents()
    {
        return $this->hasMany(Incident::class, 'segment_id');
    }
}
