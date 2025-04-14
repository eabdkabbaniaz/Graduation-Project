<?php

namespace Modules\Student\App\Http\Controllers;

use App\Http\Controllers\Controller;
use Modules\Student\Services\CategoryService;

class CategoryController extends Controller
{

    protected $category_service;


    public function __construct(CategoryService $category_service)
    {
        $this->category_service = $category_service;
    }
    public function index()
    {
        return $this->category_service->index();
    }
    public function show($id)
    {
        return $this->category_service->show($id);
    }

}
