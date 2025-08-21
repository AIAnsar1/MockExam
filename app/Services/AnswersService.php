<?php

namespace App\Services;

use App\Repositories\AnswersRepository;

class AnswersService extends BaseService
{
    public function __construct(AnswersRepository $repository)
    {
        $this->repository = $repository;
    }
}