<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Incident extends Model
{
    use HasFactory;

    protected $table = 'incidents';
    protected $guarded = [];
    
    public function Segment()
    {
        return $this->belongsTo(Segment::class);
    }
    public function Status()
    {
        return $this->belongsTo(Status::class);
    }
}
