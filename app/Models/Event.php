<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Spatie\Translatable\HasTranslations;

class Event extends Model
{
    use HasFactory;
    use HasTranslations;
    public $translatable = ['name', 'notes'];
    protected $fillable = [
        'name',
        'notes',
        'status',
    ];

    protected $appends = ['image'];

    public function getImageAttribute()
    {
        return $this->photo != null ? asset('admin/pictures/event/' . $this->id .'/'.$this->photo->Filename ) : null;
    }

    public function Status()
    {
        return $this->status ? "Active" : 'In Active';
    }


    protected $searchable = [
        'columns' => [
            'events.name' => 10,
            'events.notes' => 10,
        ],
    ];

    public function photo()
    {
        return $this->morphOne(Photo::class, 'photoable');
    }

    public function seo()
    {
        return $this->morphOne(Seo::class, 'seoable');
    }
}
