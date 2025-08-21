<?php

namespace App\Repositories;

use App\Models\ExamAttempts;

class ExamAttemptsRepository extends BaseRepository
{
    public function __construct(ExamAttempts $model)
    {
        parent::__construct($model);
    }
}