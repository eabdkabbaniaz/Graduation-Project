<?php

namespace App\Enum;

class Permissions
{
    // Permissions for students
    const VIEW_EXPERIMENTS = 'view_experiments';
    const VIEW_PROFILE = 'view_profile';

    // Permissions for teachers
    const ADD_ASSIGNMENTS = 'add_assignments';
    const EVALUATE_STUDENTS = 'evaluate_students';
    const EXPORT_GRADES = 'export_grades';

    public static function studentPermissions()
    {
        return [
            self::VIEW_EXPERIMENTS,
            self::VIEW_PROFILE,
        ];
    }

    public static function teacherPermissions()
    {
        return [
            self::ADD_ASSIGNMENTS,
            self::EVALUATE_STUDENTS,
            self::EXPORT_GRADES,
        ];
    }

    public static function allPermissions()
    {
        return array_merge(
            self::studentPermissions(),
            self::teacherPermissions()
        );
    }
}
