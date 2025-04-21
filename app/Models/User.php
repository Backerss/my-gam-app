<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    /** @use HasFactory<\Database\Factories\UserFactory> */
    use HasFactory, Notifiable;

    protected $table = 'tb_users';
    protected $primaryKey = 'users_id';
    public $timestamps = false;

    /**
     * The attributes that are mass assignable.
     *
     * @var list<string>
     */
    protected $fillable = [
        'users_email',
        'users_phone',
        'users_password',
        'users_role',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var list<string>
     */
    protected $hidden = [
        'users_password',
    ];

    /**
     * The attributes that should be cast to dates.
     *
     * @var list<string>
     */
    protected $dates = [
        'users_created_at',
        'users_updated_at',
    ];

    /**
     * Get the password for authentication.
     *
     * @return string
     */
    public function getAuthPassword()
    {
        return $this->users_password;
    }

    /**
     * Define a one-to-one relationship with the Teacher model.
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function teacher()
    {
        return $this->hasOne(Teacher::class, 'users_id', 'users_id');
    }

    /**
     * Define a one-to-one relationship with the Student model.
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function student()
    {
        return $this->hasOne(Student::class, 'user_id', 'users_id');
    }

    /**
     * Define a one-to-one relationship with the ParentModel.
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function parent()
    {
        return $this->hasOne(ParentModel::class, 'users_id', 'users_id');
    }
}
