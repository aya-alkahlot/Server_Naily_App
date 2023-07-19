<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Services extends Model
{
    use HasFactory;
    protected $guarded = [];

    public function parent()
    {
        // return $this->hasMany(partServices::class,'title_id');
        return $this->belongsTo(Services::class, 'parent_id');
    }
    public function children()
    {
        return $this->hasMany(Services::class, 'parent_id');
    }
}
