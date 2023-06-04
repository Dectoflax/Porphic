<?php

namespace App\Models\Blog;

use App\Models\Admin;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Category extends Model
{
    use HasFactory, SoftDeletes;

    protected $keyType = 'string';

    protected $primaryKey = 'name';

    protected $fillable = [
        'id',
        'name',
        'user_id',
        'description',
        'keywords'
    ];

    public function owner()
    {
        return $this->belongsTo(Admin::class, 'user_id', 'id');
    }
}
