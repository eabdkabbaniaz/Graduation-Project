<?php
namespace Modules\Student\Services\Distributors;

use Modules\Student\Interfaces\CategoryDistributorInterface;

class SimpleCategoryDistributor implements CategoryDistributorInterface
{
    protected $countPerCategory;
    protected $startCategory;

    public function __construct(int $countPerCategory, int $startCategory)
    {
        $this->countPerCategory = $countPerCategory;
        $this->startCategory = $startCategory;
    }

    public function getCategoryId(int $rowIndex): int
    {
        return intdiv($rowIndex - 1, $this->countPerCategory) + $this->startCategory;
    }
}
