<?php

namespace App\Models;


class StudentProfile extends BaseModel
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'user_id',
        'studying_subjects',
        'progress',
        'certificates_received',
    ];
    
    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [

    ];
    
    /**
     * Get the attributes that should be cast.
     *
     * @return array<string, string>
     */
    protected $casts = [
        'studying_subjects' => 'array',
        'certificates_received' => 'array',
    ];
    
    public $translatable = [

    ];

    /**
     * Get the user that owns this student profile.
     */
    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }

    /**
     * Get the teachers associated with this student (ManyToMany).
     */
    public function teachers()
    {
        return $this->belongsToMany(User::class, 'student_teacher', 'student_id', 'teacher_id');
    }
}
