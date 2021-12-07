<?php

namespace App\Models;


use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Exercise extends Model
{
    use HasFactory;
    use SoftDeletes;
    protected $fillable = [
        'name',
        'img',
        'video',
        'description',
        'muscle_id'
    ];

    public function muscle()
    {
        return $this->belongsTo(Muscle::class);
    }


}
