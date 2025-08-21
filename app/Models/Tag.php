<?php

namespace App\Models;

use Cviebrock\EloquentSluggable\Sluggable;
use App\Models\{BaseModel, Courses, Exams};

class Tag extends BaseModel
{
    use Sluggable;
    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'title',
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
     * Return the sluggable configuration array for this model.
     *
     * @return array
     */
    public function sluggable(): array
    {
        return [
            'slug' => [
                'source' => 'title',
            ]
        ];
    }

    public function courses()
    {
        return $this->morphedByMany(Courses::class, 'taggable');
    }

    public function exams()
    {
        return $this->morphedByMany(Exams::class, 'taggable');
    }
}
