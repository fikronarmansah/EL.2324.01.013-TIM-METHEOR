<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Alerts;
use App\Models\Logs;
use Carbon\Carbon;
use Illuminate\Http\Request;

class HistoryController extends Controller
{
    public function render(Request $request)
    {

        $dataLogs = Logs::where('device', 1)
            ->orderBy('created_at', 'desc')
            ->limit(250)
            ->get();
        $dataAlerts = Alerts::where('active', 0)->get();
        $date = $request->input('date');
        $device = $request->input('device');

        if ($date || $device) {
            $dataLogs = Logs::where('device', $device ? $device : "1")->whereDate('created_at', Carbon::parse($date ? $date : "today"))->orderBy('created_at', 'desc')
                ->limit(250)->get();
        }

        return view('contents.history', [
            'header' => 'Logs History Page',
            'dataLogs' => $dataLogs,
            'dataAlerts' => $dataAlerts
        ]);
    }
}
