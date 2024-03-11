<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Hallway extends Model
{
    use HasFactory;
    protected $guarded = [];

    public function citizens()
    {
        return $this->hasMany(Citizen::class);
    }

    public function chief()
    {
        return $this->hasOne(Citizen::class, 'chief_id');
    }
}
