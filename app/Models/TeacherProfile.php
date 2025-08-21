<?php

namespace App\Models;


class TeacherProfile extends BaseModel
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'user_id',
        'education',
        'certificates',
        'experience',
        'bio',
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
        'education' => 'array',
        'certificates' => 'array',
    ];
    
    public $translatable = [

    ];

    /**
     * Get the user that owns this teacher profile.
     */
    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }
}
