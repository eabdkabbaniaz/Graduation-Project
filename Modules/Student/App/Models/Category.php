<?php

namespace Modules\Student\App\Models;

use App\Models\User;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Modules\Student\Database\factories\CategoryFactory;

class Category extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     */
   // protected $fillable = ['name'];
    protected $guarded=[];
    protected static function newFactory()
    {
        //return CategoryFactory::new();
    }
    public function students(){
        return $this->belongsToMany(User::class,'students');
    }
}
