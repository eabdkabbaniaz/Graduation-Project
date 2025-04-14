<?php

namespace Modules\Student\Services;


use Exception;
use Modules\Student\App\Jobs\ImportStudentsJob ;
use PhpOffice\PhpSpreadsheet\IOFactory;
use Modules\Traits\ApiResponseTrait;


class StudentImportService
{

    // public function importAndDistributeStudents($data, $category)
    // {
    //     try {
    //         $importFile = $data->file('file');
    //         $totalStudents = $this->numberStudent($importFile);
    //         $countCategory = ceil($totalStudents / $data->category_number);
    //         $distributor = CategoryDistributorFactory::createDistributor($data->distributionMethod, $this->numberStudent($importFile), $category);
    //         Excel::import(new StudentsImport($distributor), $importFile);
    //         return ApiResponseTrait::successResponse("تم استيراد {$totalStudents} طالبًا بنجاح، وتم وضع كل {$countCategory} طالب في فئة.");
    //     } catch (\Throwable $e) {
    //         return ApiResponseTrait::errorResponse("حدث خطأ أثناء الاستيراد: " . $e->getMessage());
    //     }
    // }
    public function importAndDistributeStudents($data, $category)
    {
        try {
            $importFile = $data->file('file');
            $filePath = $importFile->store('imports'); // يحفظ الملف داخل storage/app/imports

            ImportStudentsJob::dispatch(
                $filePath,
                $category,
                $data->distributionMethod,
                $data->category_number
            );
            return ApiResponseTrait::successResponse("جاري استيراد البيانات في الخلفية، سيتم إعلامك عند الانتهاء.");
        } catch (\Throwable $e) {
            return ApiResponseTrait::errorResponse("حدث خطأ أثناء تجهيز الاستيراد: " . $e->getMessage());
        }
    }
   // public function numberStudent($importFile)
    // {
    //     $filePath = $importFile->getRealPath();
    //     $spreadsheet = IOFactory::load($filePath);
    //     $worksheet = $spreadsheet->getActiveSheet();
    //     $rows = $worksheet->toArray();
    //     if (count($rows) <= 1) {
    //         throw new Exception("الملف فارغ أو لا يحتوي على بيانات.");
    //     }
    //     return count($rows) - 1;
    // }
}
