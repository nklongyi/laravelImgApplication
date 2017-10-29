<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Item extends Model
{

    public function category()
    {
        return $this->belongsTo('App\Category');
    }

    /**1:N
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function images(){
        return $this->hasMany('App\Image');
    }
}
