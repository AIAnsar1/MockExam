<?php

namespace App\Repositories;

use App\Models\Exams;

class ExamsRepository extends BaseRepository
{
    public function __construct(Exams $model)
    {
        parent::__construct($model);
    }
}