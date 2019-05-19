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
        'time' => 'time:hh:mm'
    ];

    public function getDayAttribute($date)
    {
        return Carbon::createFromFormat('Y-m-d', $date)->format('Y-m-d');
    }

    public function getTimeAttribute($date)
    {
        return Carbon::createFromFormat('H:i:s', $date)->format('H:i');
    }

    public function setTimeAttribute($date)
    {
        $this->attributes['time'] = Carbon::createFromFormat('H:i', $date)->format('H:i:s');
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
