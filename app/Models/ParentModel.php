<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ParentModel extends Model
{
    protected $table = 'tb_parents';
    protected $primaryKey = 'parents_id';
    public $timestamps = false;

    protected $fillable = [
        'users_id',
        'students_id',
        'parents_first_name',
        'parents_last_name',
        'parents_relationship',
        'parents_phone',
    ];

    protected $dates = [
        'parents_created_at',
    ];

    public function user()
    {
        return $this->belongsTo(User::class, 'users_id', 'users_id');
    }

    public function student()
    {
        return $this->belongsTo(Student::class, 'students_id', 'students_id');
    }
}