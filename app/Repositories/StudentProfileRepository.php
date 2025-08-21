<?php

namespace App\Repositories;

use App\Models\StudentProfile;

class StudentProfileRepository extends BaseRepository
{
    public function __construct(StudentProfile $model)
    {
        parent::__construct($model);
    }
}