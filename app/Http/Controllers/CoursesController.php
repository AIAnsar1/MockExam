<?php

namespace App\Http\Controllers;

use App\Http\Resources\CoursesResource;
use Illuminate\Http\Request;
use Throwable;
use App\Models\Courses;
use App\Services\CoursesService;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Collection;
use App\Http\Requests\StoreRequest\StoreCoursesRequest;
use App\Http\Requests\UpdateRequest\UpdateCoursesRequest;


class CoursesController extends Controller
{
    /**
     * @var CoursesService
     */
    private CoursesService $service;

    /**
     * @param CoursesService $service
     */
    public function __construct(CoursesService $service)
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
        return CoursesResource::collection( $this->service->paginatedList( $request->all() ) );
    }

    /**
     * @param StoreCoursesRequest $request
     * @return array|Builder|Collection|Courses
     * @throws Throwable
     */
    public function store(StoreCoursesRequest $request): array |Builder|Collection|Courses
    {
        return $this->service->createModel($request->validated());

    }

    /**
     * @param $courses_id
     * @return CoursesResource
     * @throws Throwable
     */
    public function show(int $courses_id)
    {
        return new CoursesResource( $this->service->getModelById( $courses_id ));
    }

    /**
     * @param UpdateCoursesRequest $request
     * @param int $courses_id
     * @return array|Courses|Collection|Builder
     * @throws Throwable
     */
    public function update(UpdateCoursesRequest $request, int $courses_id): array |Courses|Collection|Builder
    {
        return $this->service->updateModel($request->validated(), $courses_id);

    }

    /**
     * @param int $courses_id
     * @return array|Builder|Collection|Courses
     * @throws Throwable
     */
    public function destroy(int $courses_id): array |Builder|Collection|Courses
    {
        return $this->service->deleteModel($courses_id);
    }
}

