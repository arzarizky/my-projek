<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Activity extends Model
{
    use HasFactory;

    protected $table = 'activities';

    public function Hostname()
    {
        return $this->belongsTo(Hostname::class);
    }

    // public function Databases()
    // {
    //     return $this->hasMany(Database::class, 'activity_id');
    // }
}
