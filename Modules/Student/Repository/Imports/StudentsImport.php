<?php

namespace Modules\Student\Repository\Imports;

use App\Models\User;
use Maatwebsite\Excel\Concerns\WithStartRow;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\Importable;
use Maatwebsite\Excel\Concerns\WithHeadingRow;
use Modules\Student\App\Models\Student;
use Modules\Student\Interfaces\CategoryDistributorInterface;

class StudentsImport implements ToModel, WithHeadingRow, WithStartRow
{
    use Importable;
    private $rowIndex = 0;
    private $countCategory;
    private $firstCategory;
    private $distributor;

    public function __construct(CategoryDistributorInterface $distributor)
    {
        $this->distributor = $distributor;
    }
    public function startRow(): int
    {
        return 2;
    }
    private function calculateGroupNumber($index)
    {
        return intdiv($index - 1, $this->countCategory) + $this->firstCategory;
    }

    public function model(array $row)
    {
        $this->rowIndex++;
        $categoryId = $this->distributor->getCategoryId($this->rowIndex);
        $user =  User::create([
            'name' => $row['name'],
            'email' => $row['university_number'],
            'password' => bcrypt(11111111),
            'category_id' => $categoryId,
        ]);
        Student::create([
            'category_id' => $categoryId,
            'user_id' => $user->id,
        ]);
        $user->assignRole('student');
        return;
    }
}
