<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Location extends Model
{
    protected $table = 'locatie';

    use HasFactory;

    protected $fillable = [
        'locatie',
    ];
    public function stores(){
        return $this->hasMany('App\Models\Store');
    }
}
