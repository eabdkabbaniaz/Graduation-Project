<?php

namespace Modules\Student\Repository;

interface UserRepositoryInterface
{
    public function index();
    public function create($message);
    public function show($message);
    public function update($message);
    public function destroy($message);
    
}
