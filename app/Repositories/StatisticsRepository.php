<?php

namespace App\Repositories;

use App\Models\Statistics;

class StatisticsRepository extends BaseRepository
{
    public function __construct(Statistics $model)
    {
        parent::__construct($model);
    }
}