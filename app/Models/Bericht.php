<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Bericht extends Model
{
    use HasFactory;

    protected $table = 'berichten';
    protected $primaryKey = 'bericht_id';
    protected $fillable = ['bericht_content'];
}
