<?php

namespace App\Services;

use App\Repositories\QuestionsRepository;

class QuestionsService extends BaseService
{
    public function __construct(QuestionsRepository $repository)
    {
        $this->repository = $repository;
    }
}