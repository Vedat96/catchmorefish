<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Store extends Model
{
    protected $table = 'voorraad';

    use HasFactory;

    protected $fillable = [
        'locatie_id',
        'artikel_id',
        'aantal',
    ];
    public function articles(){ // dit kan je alles noemen
        return $this->belongsTo('App\Models\Article');
    }
    public function locations(){ // dit kan je alles noemen
        return $this->belongsTo('App\Models\Location');
    }
}
