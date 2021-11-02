<?php

namespace App\Models;


use Illuminate\Database\Eloquent\Model;

class security_fraud extends Model
{
    protected $table = 'security_frauds';
    protected $fillable = ['security', 'fraud'];
}
