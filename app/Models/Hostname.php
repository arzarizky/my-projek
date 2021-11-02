<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Hostname extends Model
{
    use HasFactory;

    protected $table = 'hostnames';

    public function Dbms()
    {
        return $this->belongsTo(Dbms::class);
    }

    public function Activities()
    {
        return $this->hasMany(Activity::class, 'hostname_id');
    }

    // public function Databases()
    // {
    //     return $this->hasManyThrough(Database::class, Activity::class);
    // }
}
