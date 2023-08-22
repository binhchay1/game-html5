<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ReportBug extends Model
{
    use HasFactory;

    protected $table = 'report_bug';

    protected $fillable = [
        'user_name',
        'user_email',
        'note',
        'game_name',
    ];

    public $timestamps = true;
}
