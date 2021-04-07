<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Article extends Model
{
    protected $table = 'artikel';

    use HasFactory;

        protected $fillable = [
        'product',
        'type',
        'leverancier_id',
        'inkoopprijs',
        'verkoopprijs',
    ];
    // public function users(){ // dit kan je alles noemen
    //     return $this->belongsToMany('App\User');
    // }

    public function factories(){ // dit kan je alles noemen
        return $this->belongsTo('App\Models\Factory');
    }
    public function stores(){
        return $this->hasMany('App\Models\Store');
    }

}
