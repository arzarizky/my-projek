<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Network extends Model
{
    use HasFactory;

    protected $table = 'networks';
    protected $guarded = [];

    public function Time()
    {
        return $this->belongsTo(Time::class);
    }

    public function Shift()
    {
        return $this->belongsTo(Shift::class);
    }

    public function Interconnection()
    {
        return $this->belongsTo(Interconnection::class);
    }

    public function Name()
    {
        return $this->belongsTo(Name::class);
    }
}
