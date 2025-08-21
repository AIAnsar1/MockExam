<?php

namespace App\Http\Controllers;

use App\Http\Resources\ExamAttemptsResource;
use Illuminate\Http\Request;
use Throwable;
use App\Models\ExamAttempts;
use App\Services\ExamAttemptsService;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Collection;
use App\Http\Requests\StoreRequest\StoreExamAttemptsRequest;
use App\Http\Requests\UpdateRequest\UpdateExamAttemptsRequest;


class ExamAttemptsController extends Controller
{
    /**
     * @var ExamAttemptsService
     */
    private ExamAttemptsService $service;

    /**
     * @param ExamAttemptsService $service
     */
    public function __construct(ExamAttemptsService $service)
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
        return ExamAttemptsResource::collection( $this->service->paginatedList( $request->all() ) );
    }

    /**
     * @param StoreExamAttemptsRequest $request
     * @return array|Builder|Collection|ExamAttempts
     * @throws Throwable
     */
    public function store(StoreExamAttemptsRequest $request): array |Builder|Collection|ExamAttempts
    {
        return $this->service->createModel($request->validated());

    }

    /**
     * @param $examattempts_id
     * @return ExamAttemptsResource
     * @throws Throwable
     */
    public function show(int $examattempts_id)
    {
        return new ExamAttemptsResource( $this->service->getModelById( $examattempts_id ));
    }

    /**
     * @param UpdateExamAttemptsRequest $request
     * @param int $examattempts_id
     * @return array|ExamAttempts|Collection|Builder
     * @throws Throwable
     */
    public function update(UpdateExamAttemptsRequest $request, int $examattempts_id): array |ExamAttempts|Collection|Builder
    {
        return $this->service->updateModel($request->validated(), $examattempts_id);

    }

    /**
     * @param int $examattempts_id
     * @return array|Builder|Collection|ExamAttempts
     * @throws Throwable
     */
    public function destroy(int $examattempts_id): array |Builder|Collection|ExamAttempts
    {
        return $this->service->deleteModel($examattempts_id);
    }
}

