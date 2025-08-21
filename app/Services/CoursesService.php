<?php

namespace App\Services;

use App\Repositories\CoursesRepository;

class CoursesService extends BaseService
{
    public function __construct(CoursesRepository $repository)
    {
        $this->repository = $repository;
    }
}