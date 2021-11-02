<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Dbms extends Model
{
    use HasFactory;

    protected $table = 'dbmses';

    public function Hostnames()
    {
        return $this->hasMany(Hostname::class, 'dbms_id');
    }

    // public function Activities()
    // {
    //     return $this->HasManyThrough(Activity::class, Hostname::class);
    // }

    // public function Databases()
    // {
    //     return $this->HasManyThrough(Database::class, Activity::class, Hostname::class);
    // }
}
