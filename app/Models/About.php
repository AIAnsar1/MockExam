<?php

namespace App\Models;


class About extends BaseModel
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'about_project',
        'teams',
        'social_media',
        'mission',
        'contacts',
        'partners',
        'faq',
        'policies',
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
        'about_project' => 'array',
        'teams' => 'array',
        'social_media' => 'array',
        'mission' => 'array',
        'contacts' => 'array',
        'partners' => 'array',
        'faq' => 'array',
        'policies' => 'array',
    ];

    public $translatable = [

    ];
}
