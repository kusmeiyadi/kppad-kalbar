<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Spatie\Activitylog\Models\Activity;

class ActivityLogController extends Controller
{
    public function __construct(){
        $this->middleware('auth:admin');
    }

    public function index()
    {
        $dateFrom = Carbon::now()->subDays(31);
        $dateTo   = Carbon::now();
        $activities = Activity::whereBetween('created_at', [$dateFrom, $dateTo])
                      ->orderBy('created_at', 'desc')
                      ->get()
                      ->groupBy(function ($val) {
            return Carbon::parse($val->created_at)->format('d F, Y');
        });
        return view ('admin.activity_log.activity_log', compact('activities'));
    }
}
