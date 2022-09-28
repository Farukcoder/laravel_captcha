<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use APP\Models\Category;
use APP\Models\Subctegory;
use APP\Models\User;

class Post extends Model
{
    use HasFactory;

    protected $fillable = [
        'category_id','subcategory_id','title','post_date','description','image',
    ];

    public function category(){
        return $this->belongsTo(Category::class,'category_id');
    }

    public function subcategory(){
        return $this->belongsTo(Subctegory::class,'subcategory_id');
    }
    public function user(){
        return $this->belongsTo(User::class,'user_id');
    }
}
