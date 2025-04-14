<?PHP
namespace Modules\Student\App\Jobs;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;
use Maatwebsite\Excel\Facades\Excel;
use PhpOffice\PhpSpreadsheet\IOFactory;
use Modules\Student\Repository\Imports\StudentsImport;
use Modules\Student\Services\Distributors\CategoryDistributorFactory;
use Illuminate\Http\UploadedFile;

class ImportStudentsJob implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    protected $filePath;
    protected $category;
    protected $distributionMethod;
    protected $category_number;

    public function __construct($filePath, $category, $distributionMethod, $category_number)
    {
        $this->filePath = $filePath;
        $this->category = $category;
        $this->distributionMethod = $distributionMethod;
        $this->category_number = $category_number;
    }

    public function handle()
    {
        $spreadsheet = IOFactory::load(storage_path('app/' . $this->filePath));
        $worksheet = $spreadsheet->getActiveSheet();
        $rows = $worksheet->toArray();

        if (count($rows) <= 1) {
            throw new \Exception("الملف فارغ أو لا يحتوي على بيانات.");
        }

        $totalStudents = count($rows) - 1;
        $countCategory = ceil($totalStudents / $this->category_number);

        $distributor = CategoryDistributorFactory::createDistributor(
            $this->distributionMethod,
            $totalStudents,
            $this->category
        );

        Excel::import(new StudentsImport($distributor), storage_path('app/' . $this->filePath));

        // يمكنك هنا ترسل إشعار أو تحدث حالة الاستيراد في DB إذا حابب
    }
}
