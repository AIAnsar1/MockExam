<?php

namespace App\Services;

use App\Repositories\ExamAttemptsRepository;

class ExamAttemptsService extends BaseService
{
    public function __construct(ExamAttemptsRepository $repository)
    {
        $this->repository = $repository;
    }
}