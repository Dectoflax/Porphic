<?php

namespace App\Models;

use App\Binkap\Storage;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Media extends Model
{
    use HasFactory, SoftDeletes;

    protected $keyType = 'string';

    protected $fillable = [
        'id',
        'name',
        'image',
        'user_id',
        'description',
        'type'
    ];

    public function author()
    {
        return $this->belongsTo(Admin::class);
    }

    public function url()
    {
        return Storage::url($this->getAttribute('image'));
    }

    public function description()
    {
        return $this->getAttribute('description');
    }
}
