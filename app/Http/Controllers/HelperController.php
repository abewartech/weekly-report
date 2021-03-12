<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\WeeklyReport;
use Carbon\Carbon;

class HelperController extends Controller
{
    public function activities()
    {
        $user = User::where('email', '<>', 'admin@database.com')->get();
        $dataChart = [];
        $fixuser = [];
        foreach($user as $item){
            $week = WeeklyReport::where('user_id', $item->id)
            ->where('created_at', '<', Carbon::now()->addWeek())
            ->select('activitiespastweek')->first();
            if($week){
                $dataChart[] = count(json_decode($week->activitiespastweek));
                $fixuser[] = mb_strimwidth($item->name, 0, 13, "...");
            }else{
                $dataChart[] = 0;
                $fixuser[] = mb_strimwidth($item->name, 0, 13, "...");
            }
        }

        return response()->json([
            'success' => true,
            'message' => $dataChart,
            'label' => $fixuser,
        ], 200);
    }
}
