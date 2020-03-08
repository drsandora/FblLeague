<?php

namespace App\Http\Controllers;



use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\ClubMaster;
use App\MatchClub;
use DB;

class bola extends Controller
{
    public function RecordGame(Request $request)
    {
        // {
        //     "home_club" : ["Chelsie" , "Chelsie"],
        //     "away_club" : ["Man Utd" , "Liverpool"],
        //     "score"     : ["1-3","1-1"]
        // }
        // raw body
        $hapus = MatchClub::truncate();
        $rules = [
            'home_club' => 'required|array|min:1',
            'away_club' => 'required|array|min:1',
            'score' => 'required',
        ];

        $this->validate($request, $rules);
        $check = ClubMaster::all();

        if (!$check->isEmpty()) {
            foreach ($check as $key) {
                $key->truncate();
            }
        }

        foreach ($request->home_club as $key => $value) {
            $saveClub = ClubMaster::firstOrCreate([
                'club_name'       => strtolower($request->home_club[$key])
            ]);

            $saveClub = ClubMaster::firstOrCreate([
                'club_name'       => strtolower($request->away_club[$key])
            ]);
        }

        foreach ($request->home_club as $key => $value) {
            $score = str_split($request->score[$key]);

            $saveMatch = new MatchClub([
                'club_name_home_id' => ClubMaster::where('club_name', strtolower($request->home_club[$key]))->first()->id,
                'club_name_away_id' => ClubMaster::where('club_name', strtolower($request->away_club[$key]))->first()->id,
                'score_home'        => $score[0],
                'score_away'        => $score[2]
            ]);
            $saveMatch->save();

            MatchClub::updateScore($saveMatch->club_name_home_id, $saveMatch->club_name_away_id, $saveMatch->score_home, $saveMatch->score_away);
        }

        return response()->json([
            'status'    => true,
            'message'   => 'Successfully add match',
            'home club' => $request->home_club,
            'away club' => $request->away_club,
            'score'     => $request->score
        ], 201);
    }

    public function LeagueStanding()
    {
        $klasemen = ClubMaster::orderBy('points', 'desc')->select('club_name', 'points')->get();
        return $klasemen;
    }
    public function Rank(Request $request)
    {
        $rules = [
            'clubname' => 'required',
        ];

        $this->validate($request, $rules);

        $club   = ClubMaster::where('club_name', $request->clubname)->first();

        if (!$club) {
            return response()->json([
                'message' => 'Club not found!',
                'data'    => (object) [],
            ], 404);
        }

        $allClub = ClubMaster::select('id', 'points')->groupBy('points')->orderBy('points', 'desc')->get();

        $i = 0;
        do {
            $club = ClubMaster::where('club_name', $request->clubname)->where('points', $allClub[$i]->points)->first();
            if ($club) {
                $standings = $i + 1;
            }
            $i++;
        } while (!$club);

        $data = [
            'club name'  => $request->clubname,
            'standings' => $standings
        ];

        return response()->json([
            'message' => 'successfully get rank',
            'data'    => $data,
        ], 201);
    }
}
