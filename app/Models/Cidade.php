<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Cidade extends Model
{
    protected $table  = 'cidade';

    protected $primaryKey = 'cid_id';

    protected $fillable = ['cid_nome','cid_uf'];
}
