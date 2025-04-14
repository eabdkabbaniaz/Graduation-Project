<?php


namespace Modules\Student\Services\Distributors;

use Modules\Student\Interfaces\CategoryDistributorInterface;

class RandomCategoryDistributor implements CategoryDistributorInterface
{
    protected $totalStudents;
    protected $categoryIds;

    public function __construct(int $totalStudents, array $categoryIds)
    {
        $this->totalStudents = $totalStudents;
        $this->categoryIds = $categoryIds; 
    }

    public function getCategoryId(int $rowIndex): int
    {
        shuffle($this->categoryIds);
        $categoryIndex = $rowIndex % count($this->categoryIds);
        return $this->categoryIds[$categoryIndex];
    }
}
