<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Contoh_Undangan extends Model
{
    use HasFactory;

    protected $table = 'fake_invitations';

    protected $guarded = [];
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

    public function tema()
    {
        return $this->belongsTo('App\Models\Tema_Undangan', 'theme_id', 'id');
    }

}
