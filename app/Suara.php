<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Suara extends Model
{
    protected $dates = ['created_at', 'updated_at', 'tgl_terima'];
}
