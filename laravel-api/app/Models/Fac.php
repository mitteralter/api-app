<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Fac extends Model
{
    use HasFactory;

    protected $fillable = ['rfc', "user_id"];
    

    // $facs = Post::find(1)->facs;
    // foreach ($facs as $fac) {
    //     //
    // }
    public function user(){
        return $this->belongsTo('App\Models\User');
    }
}
