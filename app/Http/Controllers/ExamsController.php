<?php

namespace App\Http\Controllers;

use App\Http\Resources\ExamsResource;
use Illuminate\Http\Request;
use Throwable;
use App\Models\Exams;
use App\Services\ExamsService;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Collection;
use App\Http\Requests\StoreRequest\StoreExamsRequest;
use App\Http\Requests\UpdateRequest\UpdateExamsRequest;


class ExamsController extends Controller
{
    /**
     * @var ExamsService
     */
    private ExamsService $service;

    /**
     * @param ExamsService $service
     */
    public function __construct(ExamsService $service)
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
        return ExamsResource::collection( $this->service->paginatedList( $request->all() ) );
    }

    /**
     * @param StoreExamsRequest $request
     * @return array|Builder|Collection|Exams
     * @throws Throwable
     */
    public function store(StoreExamsRequest $request): array |Builder|Collection|Exams
    {
        return $this->service->createModel($request->validated());

    }

    /**
     * @param $exams_id
     * @return ExamsResource
     * @throws Throwable
     */
    public function show(int $exams_id)
    {
        return new ExamsResource( $this->service->getModelById( $exams_id ));
    }

    /**
     * @param UpdateExamsRequest $request
     * @param int $exams_id
     * @return array|Exams|Collection|Builder
     * @throws Throwable
     */
    public function update(UpdateExamsRequest $request, int $exams_id): array |Exams|Collection|Builder
    {
        return $this->service->updateModel($request->validated(), $exams_id);

    }

    /**
     * @param int $exams_id
     * @return array|Builder|Collection|Exams
     * @throws Throwable
     */
    public function destroy(int $exams_id): array |Builder|Collection|Exams
    {
        return $this->service->deleteModel($exams_id);
    }
}

