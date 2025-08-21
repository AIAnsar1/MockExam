<?php

namespace App\Services;

use App\Repositories\ExamsRepository;

class ExamsService extends BaseService
{
    public function __construct(ExamsRepository $repository)
    {
        $this->repository = $repository;
    }
}