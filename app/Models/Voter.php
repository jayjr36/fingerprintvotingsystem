<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Voter extends Model
{
    use HasFactory;

    protected $fillable = [
        "fingerprint_id",
        "name",
        "card_no",
        "region",
        "district",
        "ward",
        "birth_date",
    ];
}
