<?php 
namespace App\Enum;

class Roles {

    const TEACHER = "teacher";
    const STUDENT = "student";

    public function roles() {
        return [
            self::TEACHER,
            self::STUDENT
        ];
    }
}
