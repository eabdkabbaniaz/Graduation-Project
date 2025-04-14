<?php
return [
    \Maatwebsite\Excel\Validators\ValidationException::class => [
        'code' => 422,
        'message' => 'فشل في التحقق من البيانات.'
    ],
    \Illuminate\Database\QueryException::class => [
        'code' => null,
        'message' => 'خطأ في قاعدة البيانات.'
    ],
   
];
