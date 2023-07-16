<?php

namespace App\Models;

use App\Models\User;
use App\Models\Brand;
use App\Models\Color;
use App\Models\Order;
use App\Models\Category;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Car extends Model
{
    use HasFactory;
    protected $fillable = [
        'title',
        'user_id',
        'description',
        'type',
        'image_url',
        'location',
        'cylinder',
        'color_id',
        'brand_id',
        'transmission',
        'category_id',
        'sit_number',
        'price'
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
    public function color()
    {
        return $this->belongsTo(Color::class);
    }
    public function category()
    {
        return $this->belongsTo(Category::class);
    }
    public function brand()
    {
        return $this->belongsTo(Brand::class);
    }
    public function orders()
    {
        return $this->hasMany(Order::class);
    }

}
