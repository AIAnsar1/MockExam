<?php

namespace App\Http\Controllers;

use App\Http\Resources\QuestionsResource;
use Illuminate\Http\Request;
use Throwable;
use App\Models\Questions;
use App\Services\QuestionsService;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Collection;
use App\Http\Requests\StoreRequest\StoreQuestionsRequest;
use App\Http\Requests\UpdateRequest\UpdateQuestionsRequest;


class QuestionsController extends Controller
{
    /**
     * @var QuestionsService
     */
    private QuestionsService $service;

    /**
     * @param QuestionsService $service
     */
    public function __construct(QuestionsService $service)
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
        return QuestionsResource::collection( $this->service->paginatedList( $request->all() ) );
    }

    /**
     * @param StoreQuestionsRequest $request
     * @return array|Builder|Collection|Questions
     * @throws Throwable
     */
    public function store(StoreQuestionsRequest $request): array |Builder|Collection|Questions
    {
        return $this->service->createModel($request->validated());

    }

    /**
     * @param $questions_id
     * @return QuestionsResource
     * @throws Throwable
     */
    public function show(int $questions_id)
    {
        return new QuestionsResource( $this->service->getModelById( $questions_id ));
    }

    /**
     * @param UpdateQuestionsRequest $request
     * @param int $questions_id
     * @return array|Questions|Collection|Builder
     * @throws Throwable
     */
    public function update(UpdateQuestionsRequest $request, int $questions_id): array |Questions|Collection|Builder
    {
        return $this->service->updateModel($request->validated(), $questions_id);

    }

    /**
     * @param int $questions_id
     * @return array|Builder|Collection|Questions
     * @throws Throwable
     */
    public function destroy(int $questions_id): array |Builder|Collection|Questions
    {
        return $this->service->deleteModel($questions_id);
    }
}

