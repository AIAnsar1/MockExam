<?php

namespace App\Models;


use App\Constants\UsersRoles;
use App\Constants\GeneralStatus;
use Laravel\Passport\HasApiTokens;
use App\Models\{UserRoles, BaseModel};
use Spatie\Permission\Traits\HasRoles;
use Illuminate\Notifications\Notifiable;
use Illuminate\Contracts\Auth\Access\Authorizable as IAuthorizableContract;
use Illuminate\Foundation\Auth\Access\Authorizable as TAuthorizable;
use Spatie\Permission\PermissionRegistrar;
use Filament\Models\Contracts\FilamentUser;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Auth\Authenticatable as TAuthenticatable;
use Illuminate\Contracts\Auth\Authenticatable as IAuthenticatableContract;
use Illuminate\Database\Eloquent\Relations\{hasMany, belongsTo, BelongsToMany};
use Filament\Panel;

class User extends BaseModel implements IAuthenticatableContract, IAuthorizableContract, FilamentUser
{
    use HasApiTokens, HasFactory, Notifiable, HasRoles, TAuthenticatable, TAuthorizable;
    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'id',
        'name',
        'username',
        'date',
        'email',
        'email_verified_at',
        'phone',
        'phone_verified_at',
        'status',
        'address',
        'password',
        'created_at',
        'updated_at',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * Get the attributes that should be cast.
     *
     * @return array<string, string>
     */
    protected $casts = [
        'address' => 'array',
        'date' => 'datetime',
        'email_verified_at' => 'datetime',
        'phone_verified_at' => 'datetime',
    ];

    /**
     * Get the attributes that should be cast.
     *
     * @return array<string, string>
     */
    protected $with = [
        // Avoid colliding with Spatie's HasRoles::roles relation.
        'userRoles',
    ];

    /**
     * Get the attributes that should be cast.
     *
     * @return array<string, string>
     */

    public $translatable = [

    ];



    public function userRoles(): HasMany
    {
        return $this->hasMany(UserRoles::class);
    }

    public function getActiveRole()
    {
        return $this->userRoles()->where('status', GeneralStatus::STATUS_ACTIVE)->first();
    }

    public function canAccessPanel(Panel $panel): bool
    {
        return true;
    }

    /**
     * Get the teacher profile associated with this user.
     */
    public function teacherProfile()
    {
        return $this->hasOne(TeacherProfile::class, 'user_id');
    }

    /**
     * Get the student profile associated with this user.
     */
    public function studentProfile()
    {
        return $this->hasOne(StudentProfile::class, 'user_id');
    }

    /**
     * Get the courses created by this user.
     */
    public function createdCourses()
    {
        return $this->hasMany(Courses::class, 'created_by');
    }

    /**
     * Get the exam attempts made by this user.
     */
    public function examAttempts()
    {
        return $this->hasMany(ExamAttempts::class, 'user_id');
    }

    /**
     * Get the students associated with this teacher (ManyToMany).
     */
    public function students()
    {
        return $this->belongsToMany(StudentProfile::class, 'student_teacher', 'teacher_id', 'student_id');
    }

}
