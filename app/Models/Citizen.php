<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Citizen extends Model
{
    use HasFactory;
    protected $guarded = ['id'];

    public function hallway()
    {
        return $this->belongsTo(Hallway::class);
    }

    public function chief()
    {
        return $this->hasOne(Hallway::class, 'chief_id');
    }

    public function family()
    {
        return $this->belongsTo(Family::class);
    }
}
