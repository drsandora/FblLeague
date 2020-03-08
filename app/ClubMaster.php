<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ClubMaster extends Model
{
    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'clubs_masters';

    protected $fillable = [
        'club_name', 'points'
    ];
}
