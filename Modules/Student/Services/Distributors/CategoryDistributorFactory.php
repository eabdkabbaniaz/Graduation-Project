<?php

namespace Modules\Student\Services\Distributors;

use Modules\Student\Interfaces\CategoryDistributorInterface;

class CategoryDistributorFactory
{
    public static function createDistributor(string $distributionMethod, $totalStudents, $category)
    {
        switch ($distributionMethod) {
            case 'random':
                return new RandomCategoryDistributor($totalStudents, $category);
            case 'simple':
            default:
                $countCategory = ceil($totalStudents / count($category));
                return new SimpleCategoryDistributor($countCategory, $category[0]);
        }
    }
}
