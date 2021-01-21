<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class WIsata extends Model
{
    protected $table = 'wisata';
    protected $fillable = ['wisata', 'descripsi', 'lokasi', 'foto'];
}
