<?php

namespace App\Models\Blog;

use App\Models\Admin;
use App\Models\Media;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Draft extends Model
{
    use HasFactory, SoftDeletes;

    protected $keyType = 'string';

    protected $primaryKey = 'id';

    protected $fillable = [
        'id',
        'user_id',
        'topic',
        'body',
        'category',
        'views',
        'media',
        'description',
        'keywords'
    ];

    public function categoryModel()
    {
        return $this->belongsTo(Category::class, 'category', 'name');
    }

    public function thumbnail()
    {
        return $this->hasOne(Media::class, 'id', 'media')->where('type', 'thumb');
    }

    public function media()
    {
        return $this->hasMany(Media::class, 'id', 'media');
    }

    public function author()
    {
        return $this->belongsTo(Admin::class, 'user_id');
    }
}
