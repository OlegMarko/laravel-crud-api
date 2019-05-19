<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Carbon\Carbon;

class Classes extends Model
{
    /**
     * The attributes that aren't mass assignable.
     *
     * @var array
     */
    protected $guarded = [];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'day' => 'date:Y-m-d',
        'time' => 'date:hh:mm'
    ];

    public function getDayAtAttribute($date)
    {
        return Carbon::createFromFormat('Y-m-d H:i:s', $date)->format('Y-m-d');
    }

    public function getTimeAtAttribute($date)
    {
        return Carbon::createFromFormat('Y-m-d H:i:s', $date)->format('hh:mm');
    }

    public function user()
    {
        return $this->belongsTo(Student::class);
    }

    public function classes()
    {
        return $this->hasMany(Teacher::class);
    }
}
