<?php

namespace Modules\Student\Repository;

use App\Models\User;

class TeacherRepository implements UserRepositoryInterface
{

    public function index() {}
    public function create($message) {}
    public function show($message) {}
    public function update($message)
    {
        $student = User::findOrFail($message['id']);
        $student->update($message['data']);
        return $student;
    }
    public function destroy($message)
    {
        return    User::destroy($message);
    }
};
