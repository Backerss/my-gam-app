<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Student extends Model
{
    protected $table = 'tb_students';
    protected $primaryKey = 'students_id';
    public $timestamps = false;

    protected $fillable = [
        'user_id',
        'students_code',
        'students_first_name',
        'students_last_name',
        'students_classroom',
        'students_current_score',
        'students_status',
    ];

    protected $dates = [
        'students_created_at',
    ];

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id', 'users_id');
    }

    public function parents()
    {
        return $this->hasMany(ParentModel::class, 'students_id', 'students_id');
    }
}