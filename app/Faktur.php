<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class faktur extends Model
{
    public function user()
    {
        return $this->belongsTo('App\User','userr_id', 'id');
    }
    public function pesanan()
    {
        return $this->belongsTo('App\PesananDetail','pesenan_id', 'id');
    }
}
