<?php

namespace Modules\Student\App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Modules\Student\App\Http\Requests\CreateStudentRequest;
use Modules\Student\Services\StudentAdminService;

class StudentAdminController extends Controller
{
    protected $student_service;

    public function __construct(StudentAdminService $student_service)
    {
        $this->student_service = $student_service;
    }

    public function index()
    {
        return $this->student_service->index();
    }
    public function create(CreateStudentRequest $message)
    {
        return $this->student_service->create($message);
    }

    public function show($message)
    {
        return $this->student_service->show($message);
    }

    public function update($id, Request $request)
    {
        $message['id'] = $id;
        $message['data'] = $request->input();
        return $this->student_service->update($message);
    }

    public function destroy($message)
    {
        return $this->student_service->destroy($message);
    }
}
