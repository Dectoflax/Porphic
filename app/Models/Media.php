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
        'file',
        'user_id',
        'description',
        'type',
        'keywords'
    ];

    public function author()
    {
        return $this->belongsTo(Admin::class);
    }

    public function url()
    {
        // todo
        return \asset('resources/svg/Logo_ring.svg');
        return Storage::url($this->getAttribute('file'));
    }

    public function description()
    {
        return $this->getAttribute('description');
    }
}
