<?php

namespace App\Models\Blog;

use App\Models\Admin;
use App\Models\Media;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Post extends Model
{
    use HasFactory, SoftDeletes;

    protected $keyType = 'string';

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
        return $this->belongsTo(Category::class, 'category', 'id');
    }

    public function thumbnail()
    {
        \dd('Set type to continue');
        // todo
        return $this->hasOne(Media::class, 'id', 'media')->where();
    }

    public function media()
    {
        return $this->hasMany(Media::class, 'id', 'media');
    }

    public function author()
    {
        return $this->belongsTo(Admin::class, 'user_id');
    }

    public function comments()
    {
        return $this->hasMany(Comment::class)->with(['user', 'replies']);
    }

    public function commentReplies()
    {
        return $this->hasManyThrough(CommentReply::class, Comment::class);
    }
}
