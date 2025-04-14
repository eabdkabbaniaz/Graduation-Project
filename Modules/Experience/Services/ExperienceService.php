<?php

namespace Modules\Experience\Services;

use Modules\Experience\Repository\ExperienceRepository;
use Modules\Traits\ApiResponseTrait;
use Exception;

class ExperienceService
{
    protected $repo;

    public function __construct(ExperienceRepository $repo)
    {
        $this->repo = $repo;
    }

    public function index()
    {
        try {
            $experience = $this->repo->index();
            return ApiResponseTrait::successResponse("", $experience);
        } catch (\Throwable $e) {
            return ApiResponseTrait::errorResponse($e->getMessage());
        }
    }
    public function show($id)
    {
        try {
            $experience = $this->repo->find($id);
            if (!$experience) {
                throw new Exception("التجربة غير موجودة");
            }
            return ApiResponseTrait::successResponse("", $experience);
        } catch (\Throwable $e) {
            return ApiResponseTrait::errorResponse($e->getMessage());
        }
    }
    public function create($message)
    {
        try {
            $experience =  $this->repo->create($message);
            return ApiResponseTrait::successResponse("تم  اضافة تجربة  بنجاح", $experience);
        } catch (\Throwable $e) {
            return ApiResponseTrait::errorResponse($e->getMessage());
        }
    }
    public function update($message)
    {
        try {
            $experience = $this->repo->update($message);
            return ApiResponseTrait::successResponse("تم تحديث بيانات التجربة بنجاح", $experience);
        } catch (\Throwable $e) {
            return ApiResponseTrait::errorResponse($e->getMessage());
        }
    }
    public function destroy($message)
    {
        try {
            $experience = $this->repo->destroy($message);
            if (!$experience) {
                throw new Exception("التجربة غير موجودة");
            }
            return ApiResponseTrait::successResponse("", $experience);
        } catch (\Throwable $e) {
            return ApiResponseTrait::errorResponse($e->getMessage());
        }
    }
    public function changeStatus($message)
    {
        try {
            $experience = $this->repo->changeStatus($message);
            if (!$experience) {
                throw new Exception("التجربة غير موجودة");
            }
            return ApiResponseTrait::successResponse("تم تحديث الحالة بنجاح", $experience);
        } catch (\Throwable $e) {
            return ApiResponseTrait::errorResponse($e->getMessage());
        }
    }
}
