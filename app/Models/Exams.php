<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\MorphToMany;

class Exams extends BaseModel
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'course_id',
        'title',
        'slug',
        'description',
        'duration_minutes',
        'attempts_allowed',
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

    ];

    public $translatable = [

    ];

    /**
     * Get the course that owns this exam.
     */
    public function course(): BelongsTo
    {
        return $this->belongsTo(Courses::class, 'course_id');
    }

    /**
     * Get the questions for this exam.
     */
    public function questions(): HasMany
    {
        return $this->hasMany(Questions::class, 'exam_id');
    }

    /**
     * Get the exam attempts for this exam.
     */
    public function examAttempts(): HasMany
    {
        return $this->hasMany(ExamAttempts::class, 'exam_id');
    }

    /**
     * Get the tags for this exam.
     */
    public function tags(): MorphToMany
    {
        return $this->morphToMany(Tag::class, 'taggable');
    }
}
