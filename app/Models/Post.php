<?php

namespace App\Models;

use Carbon\Carbon;
use App\Support\Address;
use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    use HasFactory;

    protected $fillable = ['user_id', 'category_id', 'image', 'article', 'title', 'slug'];

    public function getRouteKeyName()
    {
        return 'slug';
    }

    public function category()
    {
        return $this->belongsTo(Category::class);
    }

    public function tags()
    {
        return $this->belongsToMany(Tag::class);
    }

    public function getDateHumanAttribute()
    {
        return "{$this->created_at->diffForHumans()}";
    }

    public function getDateAttribute()
    {
        return "{$this->created_at->translatedFormat('l, jS F Y')}";
    }

    // protected function title(): Attribute
    // {
    //     return Attribute::make(
    //         get: fn ($value, $attributes) => new Post(
    //             $attributes['title_line_one'],
    //             $attributes['title_line_two'],
    //         ),
    //     );
    //     // return Attribute::make(
    //     //     get: fn ($value, $attributes) => new Address(
    //     //         $attributes['title_line_one'],
    //     //         $attributes['title_line_two'],
    //     //     ),
    //     // );
    // }

    // public function getCreatedAtAttribute($value)
    // {
    //     return Carbon::parse($value)->translatedFormat('l, jS F Y');
    // }
}
