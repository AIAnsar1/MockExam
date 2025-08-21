<?php

namespace App\Repositories;

use App\Models\TeacherProfile;

class TeacherProfileRepository extends BaseRepository
{
    public function __construct(TeacherProfile $model)
    {
        parent::__construct($model);
    }
}