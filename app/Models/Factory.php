<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Factory extends Model
{   
    protected $table = 'leverancier';

    use HasFactory;

    protected $fillable = [
        'leverancier',
        'telefoon',
    ];

    public function factories(){
        return $this->belongsTo('App\Models\Factory');
    }
    // public function users(){
    //     return $this->belongsToMany('App\User');
    // }
    public function articles(){
    	return $this->hasMany('App\Models\Article');
    }
}
