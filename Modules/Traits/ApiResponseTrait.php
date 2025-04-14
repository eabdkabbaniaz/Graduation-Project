<?php
namespace Modules\Traits;

trait ApiResponseTrait
{
    public static function successResponse($message = 'تم بنجاح', $data = [], $code = 200)
    {
        return response()->json([
            'success' => true,
            'message' => $message,
            'data'    => $data,
        ], $code);
    }

    public static function errorResponse($message = 'حدث خطأ ما', $code = 500, $errors = [])
    {
        return response()->json([
            'success' => false,
            'message' => $message,
            'errors'  => $errors,
        ], $code);
    }
}
