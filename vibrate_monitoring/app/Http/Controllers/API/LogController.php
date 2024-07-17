<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\Alerts;
use App\Models\Logs;
use Illuminate\Http\Request;

class LogController extends Controller
{
    public function getLogs()
    {


        $alerts = Alerts::where('active', 0)->get();

        return response()->json([
            'data' => $alerts
        ]);
    }

    public function updateActive($id)
    {
        $alert = Alerts::findOrFail($id);
        $alert->active = 1;
        $alert->save();

        return response()->json(['success' => true]);
    }

    public function deleteAllNotifications()
    {
        try {
            // Ubah semua notifikasi dengan active = 0 menjadi active = 1
            Alerts::where('active', 0)->update(['active' => 1]);

            // Jika berhasil, kirim respon JSON
            return response()->json(['success' => true]);
        } catch (\Exception $e) {
            // Jika terjadi kesalahan, kirim respon JSON dengan pesan kesalahan
            return response()->json(['success' => false, 'error' => $e->getMessage()], 500);
        }
    }
}
