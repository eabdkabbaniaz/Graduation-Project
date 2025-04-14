<?php 

namespace Modules\Student\Repository;
use Modules\Student\App\Models\Category;

class CategoryRepository
{
    public function index()
    {
        return Category::get();
    }

    public function find($id)
    {
        return Category::with('students')->findOrFail($id);
    }

    public function create(array $data)
    {
        return Category::create($data);
    }

    public function update($id, array $data)
    {
        $student = Category::findOrFail($id);
        $student->update($data);
        return $student;
    }

    public function delete($id)
    {
        Category::destroy($id);
    }
}
