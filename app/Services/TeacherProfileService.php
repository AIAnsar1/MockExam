<?php

namespace App\Services;

use App\Repositories\TeacherProfileRepository;

class TeacherProfileService extends BaseService
{
    public function __construct(TeacherProfileRepository $repository)
    {
        $this->repository = $repository;
    }
}