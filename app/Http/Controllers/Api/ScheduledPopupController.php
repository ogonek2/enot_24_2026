<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\PopupModal;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;

class ScheduledPopupController extends Controller
{
    /**
     * Вікна, заплановані на сьогодні (timezone з config/app.php), для черги на фронті.
     */
    public function index(Request $request)
    {
        $tz = config('app.timezone', 'UTC');
        $date = $request->query('date')
            ? Carbon::parse($request->query('date'), $tz)->startOfDay()
            : Carbon::now($tz)->startOfDay();

        $modals = PopupModal::scheduledForDate($date)->get()->map(function (PopupModal $modal) {
            return [
                'id' => $modal->id,
                'desktop_image_url' => $modal->resolvedDesktopUrl(),
                'mobile_image_url' => $modal->resolvedMobileUrl(),
                'form_title' => $modal->form_title,
                'form_subtitle' => $modal->form_subtitle,
                'delay_before_show_seconds' => (int) $modal->delay_before_show_seconds,
                'seconds_after_close_until_next' => (int) $modal->seconds_after_close_until_next,
            ];
        });

        return response()->json([
            'date' => $date->format('Y-m-d'),
            'modals' => $modals,
        ]);
    }
}
