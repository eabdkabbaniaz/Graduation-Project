<?php

namespace Modules\Experience\App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Modules\Experience\Database\factories\ExperienceFactory;

class Experience extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     */
    protected $guarded=[];
    protected $fillable = [];
    
    protected static function newFactory()
    {
        //return ExperienceFactory::new();
    }
}
