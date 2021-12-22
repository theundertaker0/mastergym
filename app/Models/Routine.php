<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Routine extends Model
{
    use HasFactory;
    use SoftDeletes;
    protected $fillable = [
        'name',
        'description',
    ];

    public function exercises()
    {
        return $this->belongsToMany(Exercise::class)->withPivot('series','repetitions');
    }

    public function trainings()
    {
        return $this->belongsToMany(Training::class);
    }
}
