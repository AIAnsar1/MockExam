<?php

namespace App\Http\Controllers;

use App\Http\Resources\StatisticsResource;
use Illuminate\Http\Request;
use Throwable;
use App\Models\Statistics;
use App\Services\StatisticsService;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Collection;
use App\Http\Requests\StoreRequest\StoreStatisticsRequest;
use App\Http\Requests\UpdateRequest\UpdateStatisticsRequest;


class StatisticsController extends Controller
{
    /**
     * @var StatisticsService
     */
    private StatisticsService $service;

    /**
     * @param StatisticsService $service
     */
    public function __construct(StatisticsService $service)
    {
        $this->service = $service;
    }

    /**
     * @param Request $request
     * @return \Illuminate\Http\Resources\Json\AnonymousResourceCollection
     * @throws Throwable
     */
    public function index(Request $request)
    {
        return StatisticsResource::collection( $this->service->paginatedList( $request->all() ) );
    }

    /**
     * @param StoreStatisticsRequest $request
     * @return array|Builder|Collection|Statistics
     * @throws Throwable
     */
    public function store(StoreStatisticsRequest $request): array |Builder|Collection|Statistics
    {
        return $this->service->createModel($request->validated());

    }

    /**
     * @param $statistics_id
     * @return StatisticsResource
     * @throws Throwable
     */
    public function show(int $statistics_id)
    {
        return new StatisticsResource( $this->service->getModelById( $statistics_id ));
    }

    /**
     * @param UpdateStatisticsRequest $request
     * @param int $statistics_id
     * @return array|Statistics|Collection|Builder
     * @throws Throwable
     */
    public function update(UpdateStatisticsRequest $request, int $statistics_id): array |Statistics|Collection|Builder
    {
        return $this->service->updateModel($request->validated(), $statistics_id);

    }

    /**
     * @param int $statistics_id
     * @return array|Builder|Collection|Statistics
     * @throws Throwable
     */
    public function destroy(int $statistics_id): array |Builder|Collection|Statistics
    {
        return $this->service->deleteModel($statistics_id);
    }
}

