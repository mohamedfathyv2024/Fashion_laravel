<?php

namespace App\Models;
use App\Models\Tag;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Blog extends Model
{
    protected $table='blogs';
    protected $fillable=[
        'title',
        'body',
        'image'
    ];
    public function tags()
    {
        return $this->belongsToMany(Tag::class, 'blog_tag', 'blog_id', 'tag_id');
    }
    use HasFactory;
    
}
