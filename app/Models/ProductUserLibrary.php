<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProductUserLibrary extends Model
{
    public $table = 'product_user_libraries';

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    public $fillable = [
        'uuid',
        'user_id',
        'product_id',
        'product_chapter_id',
        'deviceId',
        'status',
    ];

    public $fillableSearchLike = [
        'title',
    ];

    public function product()
    {
        return $this->hasOne(Product::class, 'id', 'product_id')->select('id', 'uuid', 'title', 'slug', 'thumbnail', 'content', 'category_id', 'total_chap', 'view', 'rate', 'status', 'created_at', 'updated_at');
    }
}
