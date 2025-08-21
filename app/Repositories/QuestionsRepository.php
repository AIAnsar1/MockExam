<?php

namespace App\Repositories;

use App\Models\Questions;

class QuestionsRepository extends BaseRepository
{
    public function __construct(Questions $model)
    {
        parent::__construct($model);
    }
}