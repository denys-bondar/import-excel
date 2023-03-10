<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name',
        'parent_id',
    ];

    public function categories()
    {
        return $this->hasMany(Category::class, 'parent_id');
    }

    public function childrenCategory()
    {
        return $this->hasMany(Category::class, 'parent_id')->with('categories');
    }

    public function grandChildrenCategory()
    {
        return $this->hasMany(Category::class, 'parent_id')->with('childrenCategory');
    }
}
