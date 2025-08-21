<?php

namespace App\Http\Controllers;

use App\Http\Resources\TeacherProfileResource;
use Illuminate\Http\Request;
use Throwable;
use App\Models\TeacherProfile;
use App\Services\TeacherProfileService;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Collection;
use App\Http\Requests\StoreRequest\StoreTeacherProfileRequest;
use App\Http\Requests\UpdateRequest\UpdateTeacherProfileRequest;


class TeacherProfileController extends Controller
{
    /**
     * @var TeacherProfileService
     */
    private TeacherProfileService $service;

    /**
     * @param TeacherProfileService $service
     */
    public function __construct(TeacherProfileService $service)
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
        return TeacherProfileResource::collection( $this->service->paginatedList( $request->all() ) );
    }

    /**
     * @param StoreTeacherProfileRequest $request
     * @return array|Builder|Collection|TeacherProfile
     * @throws Throwable
     */
    public function store(StoreTeacherProfileRequest $request): array |Builder|Collection|TeacherProfile
    {
        return $this->service->createModel($request->validated());

    }

    /**
     * @param $teacherprofile_id
     * @return TeacherProfileResource
     * @throws Throwable
     */
    public function show(int $teacherprofile_id)
    {
        return new TeacherProfileResource( $this->service->getModelById( $teacherprofile_id ));
    }

    /**
     * @param UpdateTeacherProfileRequest $request
     * @param int $teacherprofile_id
     * @return array|TeacherProfile|Collection|Builder
     * @throws Throwable
     */
    public function update(UpdateTeacherProfileRequest $request, int $teacherprofile_id): array |TeacherProfile|Collection|Builder
    {
        return $this->service->updateModel($request->validated(), $teacherprofile_id);

    }

    /**
     * @param int $teacherprofile_id
     * @return array|Builder|Collection|TeacherProfile
     * @throws Throwable
     */
    public function destroy(int $teacherprofile_id): array |Builder|Collection|TeacherProfile
    {
        return $this->service->deleteModel($teacherprofile_id);
    }
}

