<?php

namespace Okao\LaravelLogger\Models;
use Illuminate\Database\Eloquent\Model;

class OkaoLog extends Model
{
    protected $guarded  = [];
    protected $table    = 'okao_logs';
    protected $casts = [
        'input'     => 'array',
        'output'    => 'array'
    ];
}
