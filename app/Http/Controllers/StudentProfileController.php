<?php

namespace App\Http\Controllers;

use App\Http\Resources\StudentProfileResource;
use Illuminate\Http\Request;
use Throwable;
use App\Models\StudentProfile;
use App\Services\StudentProfileService;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Collection;
use App\Http\Requests\StoreRequest\StoreStudentProfileRequest;
use App\Http\Requests\UpdateRequest\UpdateStudentProfileRequest;


class StudentProfileController extends Controller
{
    /**
     * @var StudentProfileService
     */
    private StudentProfileService $service;

    /**
     * @param StudentProfileService $service
     */
    public function __construct(StudentProfileService $service)
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
        return StudentProfileResource::collection( $this->service->paginatedList( $request->all() ) );
    }

    /**
     * @param StoreStudentProfileRequest $request
     * @return array|Builder|Collection|StudentProfile
     * @throws Throwable
     */
    public function store(StoreStudentProfileRequest $request): array |Builder|Collection|StudentProfile
    {
        return $this->service->createModel($request->validated());

    }

    /**
     * @param $studentprofile_id
     * @return StudentProfileResource
     * @throws Throwable
     */
    public function show(int $studentprofile_id)
    {
        return new StudentProfileResource( $this->service->getModelById( $studentprofile_id ));
    }

    /**
     * @param UpdateStudentProfileRequest $request
     * @param int $studentprofile_id
     * @return array|StudentProfile|Collection|Builder
     * @throws Throwable
     */
    public function update(UpdateStudentProfileRequest $request, int $studentprofile_id): array |StudentProfile|Collection|Builder
    {
        return $this->service->updateModel($request->validated(), $studentprofile_id);

    }

    /**
     * @param int $studentprofile_id
     * @return array|Builder|Collection|StudentProfile
     * @throws Throwable
     */
    public function destroy(int $studentprofile_id): array |Builder|Collection|StudentProfile
    {
        return $this->service->deleteModel($studentprofile_id);
    }
}

