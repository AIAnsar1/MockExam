<?php

namespace App\Repositories;

use App\Models\Answers;

class AnswersRepository extends BaseRepository
{
    public function __construct(Answers $model)
    {
        parent::__construct($model);
    }
}