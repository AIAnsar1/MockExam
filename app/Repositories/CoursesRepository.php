<?php

namespace App\Repositories;

use App\Models\Courses;

class CoursesRepository extends BaseRepository
{
    public function __construct(Courses $model)
    {
        parent::__construct($model);
    }
}