<?php

namespace Modules\Student\Repository;

use App\Models\User;
use Modules\Student\App\Models\Student;
use Modules\Student\Repository\UserRepositoryInterface;

class StudentRepository implements UserRepositoryInterface
{
    public function index()
    {
     return   User::role('student')->with('students.category')->get();
    }
    public function create($message)
    {
        $user =  User::create([
            'name' => $message['name'],
            'email' => $message['university_number'],
            'password' => bcrypt(11111111),
        ]);
        Student::create([
            'category_id' => $message['category_id'],
            'user_id' => $user->id,
        ]);
        $user->assignRole('student');
        return $user;
    }
    public function show($message)
    {
        return User::with('students.category')->find($message);
    }
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
}
