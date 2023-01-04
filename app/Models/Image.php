<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Storage;

class Image extends Model
{
    use HasFactory;

    protected $fillable = [
        'title',
        'slug',
        'file',
        'dimension',
        'is_published',
        'user_id'
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function uploadDate()
    {
        return $this->created_at->diffForHumans();
    }

    public static function makeDirectory()
    {
        $sub_folder = 'images/' . date('Y/m/d');
        Storage::makeDirectory($sub_folder);
        return $sub_folder;
    }

    public static function getDimension($image)
    {
        [$width, $height] = getimagesize(Storage::path($image));
        return $width . 'x' . $height;
    }

    public function fileUrl()
    {
        return Storage::url($this->file);
    }

    public function permalink()
    {
        return $this->slug ? route('images.show', $this->slug) : '#';
    }

    public function route($method, $key = 'id')
    {
        return route("images.{$method}", $this->$key);
    }

    public function scopePublished($builder)
    {
        return $builder->where('is_published', true);
    }

    protected function getSlug()
    {
        $slug = str($this->title)->slug();
        $numSlugsFound = Image::where('slug', 'regexp', "^" . $slug . "(-[0-9]*)?")->count();
        if ($numSlugsFound > 0) {
            return $slug . '-' . $numSlugsFound + 1;
        }
        return $slug;
    }

    protected static function booted()
    {
        static::creating(function ($image) {
            if ($image->title) {
                $image->slug = $image->getSlug();
                $image->is_published = true;
            }
        });

        static::updating(function ($image) {
            if ($image->title && !$image->slug) {
                $image->slug = $image->getSlug();
                $image->is_published = true;
            }
        });

        static::deleted(function ($image) {
            Storage::delete($image->file);
        });
    }
}