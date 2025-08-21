<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Answers extends BaseModel
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'question_id',
        'answer_text',
        'is_correct',
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
        'is_correct' => 'boolean',
    ];

    public $translatable = [

    ];

    /**
     * Get the question that owns this answer.
     */
    public function question(): BelongsTo
    {
        return $this->belongsTo(Questions::class, 'question_id');
    }
}
