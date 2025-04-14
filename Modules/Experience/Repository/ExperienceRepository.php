<?php

namespace Modules\Experience\Repository;

use Modules\Experience\App\Models\Experience;

class ExperienceRepository
{
    public function index()
    {
        return Experience::get();
    }

    public function find($id)
    {
        return Experience::find($id);
    }

    public function create($message)
    {

        return Experience::create($message);
    }

    public function update($message)
    {
        $experience = Experience::find($message['id']);
        $experience->update($message['data']);
        return $experience;
    }

    public function destroy($id)
    {
        return    Experience::destroy($id);
    }
    public function changeStatus($id)
    {
        $experience = Experience::find($id);
        $experience->status = $experience->status == 1 ? 0 : 1;
        $experience->save();
        return $experience;
    }
}
