<?php

namespace Modules\Experience\App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Modules\Experience\App\Http\Requests\ExperienceRequest;
use Modules\Experience\Services\ExperienceService;

class ExperienceController extends Controller
{
    protected $experience_service;
    public  function __construct(ExperienceService $experience_service)
    {
        $this->experience_service = $experience_service;
    }
    public function index()
    {
        return  $this->experience_service->index();
    }


    public function create(ExperienceRequest $request)
    {
        $message = $request->all();
        return   $this->experience_service->create($message);
    }



    public function show($id)
    {
        return   $this->experience_service->show($id);
    }


    public function update(Request $request, $id)
    {
        $message['id'] = $id;
        $message['data'] = $request->input();
        return   $this->experience_service->update($message);
    }


    public function destroy($id)
    {
        return   $this->experience_service->destroy($id);
    }
    public function changeStatus($id)
    {
        return   $this->experience_service->changeStatus($id);
    }
}
