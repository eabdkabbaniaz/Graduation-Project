<?php
namespace Modules\Student\Exceptions;

use Throwable;
use Illuminate\Support\Facades\Config;
use Modules\Traits\ApiResponseTrait;

class ImportExceptionHandler
{
    use ApiResponseTrait;

    public static function handle(Throwable $e)
    {
        $handlers = Config::get('exceptions');

        foreach ($handlers as $class => $handler) {
            if ($e instanceof $class) {
                if ($e instanceof \Illuminate\Database\QueryException && $e->getCode() == 23000) {
                 
                    return self::errorResponse('يوجد رقم جامعي مكرر');
                }

                return self::errorResponse($e->getMessage());
            }
        }

        return self::errorResponse($e->getMessage());
    }
}
