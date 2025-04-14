<?php

namespace Modules\Student\Services;

use Modules\Student\Repository\UserRepositoryInterface;
use Modules\Student\Repository\StudentRepository;;

use Exception;
use Modules\Traits\ApiResponseTrait;

class StudentAdminService
{
    protected $user_repository_student;
    public function __construct(StudentRepository $user_repository_student)
    {
        $this->user_repository_student  = $user_repository_student;
    }

    public function index()
    {
        try {
            $student =  $this->user_repository_student->index();
            return ApiResponseTrait::successResponse("", $student);
        } catch (\Throwable $e) {
            return ApiResponseTrait::errorResponse($e->getMessage());
        }
    }
    public function create($message)
    {
        try {
            $student =  $this->user_repository_student->create($message);
            return ApiResponseTrait::successResponse("تم تسجيل الطالب بنجاح", $student);
        } catch (\Throwable $e) {
            return ApiResponseTrait::errorResponse($e->getMessage());
        }
    }
    public function show($message)
    {
        try {
            $student =  $this->user_repository_student->show($message);
            if (!$student) {
                throw new Exception("الطالب غير موجود");
            }
            return ApiResponseTrait::successResponse("", $student);
        } catch (\Throwable $e) {
            return ApiResponseTrait::errorResponse($e->getMessage());
        }
    }
    public function update($message)
    {
        try {
            $student =  $this->user_repository_student->update($message);
            return ApiResponseTrait::successResponse("تم تحديث بيانات الطالب بنجاح", $student);
        } catch (\Throwable $e) {
            return ApiResponseTrait::errorResponse($e->getMessage());
        }
    }
    public function destroy($message)
    {
        try {
            $student =  $this->user_repository_student->destroy($message);
            if (!$student) {
                throw new Exception("الطالب غير موجود");
            }
            return ApiResponseTrait::successResponse("تم الحذف بنجاح", $student);
        } catch (\Throwable $e) {
            return ApiResponseTrait::errorResponse($e->getMessage());
        }
    }
}
