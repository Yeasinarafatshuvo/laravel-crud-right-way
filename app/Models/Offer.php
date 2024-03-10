<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Spatie\MediaLibrary\HasMedia;
use Spatie\MediaLibrary\InteractsWithMedia;

class Offer extends Model implements HasMedia
{
    use HasFactory;
    use InteractsWithMedia;

    

    public const PLACEHOLDER_IMAGE_PATH = 'images/placeholder.jpeg';


    protected $fillable = [
        'title',
        'price',
        'description',
        'status',
        'author_id'
    ];

    public function author()
    {
        return $this->belongsTo(User::class);
    }

    public function categories(){
        return $this->belongsToMany(Category::class);
    }

    public function locations(){
        return $this->belongsToMany(Location::class);
    }

    public function getImageUrlAttribute()
    {
        return $this->hasMedia() 
            ? $this->getFirsgetUrltMediaUrl() 
            : self::PLACEHOLDER_IMAGE_PATH;
    }
}
