<?php

namespace App\Http\Controllers;

use App\Http\Resources\AnswersResource;
use Illuminate\Http\Request;
use Throwable;
use App\Models\Answers;
use App\Services\AnswersService;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Collection;
use App\Http\Requests\StoreRequest\StoreAnswersRequest;
use App\Http\Requests\UpdateRequest\UpdateAnswersRequest;


class AnswersController extends Controller
{
    /**
     * @var AnswersService
     */
    private AnswersService $service;

    /**
     * @param AnswersService $service
     */
    public function __construct(AnswersService $service)
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
        return AnswersResource::collection( $this->service->paginatedList( $request->all() ) );
    }

    /**
     * @param StoreAnswersRequest $request
     * @return array|Builder|Collection|Answers
     * @throws Throwable
     */
    public function store(StoreAnswersRequest $request): array |Builder|Collection|Answers
    {
        return $this->service->createModel($request->validated());

    }

    /**
     * @param $answers_id
     * @return AnswersResource
     * @throws Throwable
     */
    public function show(int $answers_id)
    {
        return new AnswersResource( $this->service->getModelById( $answers_id ));
    }

    /**
     * @param UpdateAnswersRequest $request
     * @param int $answers_id
     * @return array|Answers|Collection|Builder
     * @throws Throwable
     */
    public function update(UpdateAnswersRequest $request, int $answers_id): array |Answers|Collection|Builder
    {
        return $this->service->updateModel($request->validated(), $answers_id);

    }

    /**
     * @param int $answers_id
     * @return array|Builder|Collection|Answers
     * @throws Throwable
     */
    public function destroy(int $answers_id): array |Builder|Collection|Answers
    {
        return $this->service->deleteModel($answers_id);
    }
}

