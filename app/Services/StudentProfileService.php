<?php

namespace App\Services;

use App\Repositories\StudentProfileRepository;

class StudentProfileService extends BaseService
{
    public function __construct(StudentProfileRepository $repository)
    {
        $this->repository = $repository;
    }
}