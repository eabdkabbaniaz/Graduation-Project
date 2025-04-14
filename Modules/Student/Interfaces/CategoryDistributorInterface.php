<?php

namespace Modules\Student\Interfaces;

interface CategoryDistributorInterface
{
    public function getCategoryId(int $rowIndex): int;
}
