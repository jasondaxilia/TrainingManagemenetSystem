<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ManualBook extends Model
{
    use HasFactory;

    protected $fillable = [
        'manual_book_name',
        'manual_book_description',
        'manual_book_writer',
    ];
}
