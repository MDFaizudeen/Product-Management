<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;

    protected $fillable = ['name',
     'category_id', 
     'price',
      'main_image', 
      'sub_image_1',
       'sub_image_2', 
       'sub_image_3', 
       'sub_image_4', 
       'sub_image_5'];

    public function category()
    {
        return $this->belongsTo(Category::class);   
    }
    public function orderItems()
{
    return $this->hasMany(OrderItem::class);
}

}
