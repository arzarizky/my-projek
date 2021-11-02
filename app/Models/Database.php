<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Database extends Model
{
    use HasFactory;

    protected $table = 'databases';
    protected $guarded = [];
    
    public function Time()
    {
        return $this->belongsTo(Time::class);
    }

    public function Shift()
    {
        return $this->belongsTo(Shift::class);
    }

    public function Dbms()
    {
        return $this->belongsTo(Dbms::class);
    }

    public function Activity()
    {
        return $this->belongsTo(Activity::class);
    }

    public function Hostname()
    {
        return $this->belongsTo(Hostname::class);
    }
}
