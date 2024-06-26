<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Place extends Model
{
    // use HasFactory;
    // protected $fillable = [];
    protected $guarded = [];

    public function getImageAsset()
    {
        // if ($this->image) {
        //     return asset('storage/ImageSpots/'.$this->image);
        // }

        if ($this->image) {
            return asset('upload/place/'.$this->image);
        }

        return 'https://placehold.co/150x200?text=No+Image';
    }

}
