<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\ClubMaster;

class MatchClub extends Model
{
    const WIN_SCORE     = 3;
    const LOSE_SCORE    = 0;
    const DRAW_SCORE    = 1;
    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'match_clubs';

    protected $fillable = [
        'club_name_home_id', 'club_name_away_id', 'score_home', 'score_away'
    ];

    public function clubAway()
    {
        return $this->belongsTo("App\ClubMaster", "club_name_away_id");
    }

    public function clubHome()
    {
        return $this->belongsTo("App\ClubMaster", "club_name_home_id");
    }

    public static function updateScore($homeClubId, $awayClubId, $scoreHome, $scoreAway)
    {
        $homeClub   = ClubMaster::find($homeClubId);
        $awayClub   = ClubMaster::find($awayClubId);

        if ($scoreHome > $scoreAway) {
            $homeClub->points += self::WIN_SCORE;
            $awayClub->points += self::LOSE_SCORE;
        } elseif ($scoreHome < $scoreAway) {
            $awayClub->points += self::WIN_SCORE;
            $homeClub->points += self::LOSE_SCORE;
        } else {
            $awayClub->points += self::DRAW_SCORE;
            $homeClub->points += self::DRAW_SCORE;
        }

        $homeClub->save();
        $awayClub->save();

        return response()->json('ok');
    }
}
