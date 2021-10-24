<?php

namespace App\Models;

use App\Models\Feature;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Package extends Model
{
    use HasFactory;
    protected $table = 'packages';

    protected $guarded = [];

    protected $fillable = [
        'name', 'price', 'discount', 'best', 'premium'
    ];
    public static function boot()
    {
        parent::boot();
        static::saving(function ($model) {
            $model->created_by = \Auth::user()->username;
        });
        static::updating(function ($model) {
            $model->updated_by = \Auth::user()->username;
        });
    }

    public function features()
    {
        return $this->belongsToMany(Feature::class);
    }
}
