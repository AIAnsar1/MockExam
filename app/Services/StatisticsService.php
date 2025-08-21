<?php

namespace App\Services;

use App\Repositories\StatisticsRepository;

class StatisticsService extends BaseService
{
    public function __construct(StatisticsRepository $repository)
    {
        $this->repository = $repository;
    }
}