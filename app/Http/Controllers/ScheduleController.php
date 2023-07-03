<?php

namespace App\Http\Controllers;

use App\Models\LimitedSubscription;
use App\Models\Schedule;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

class ScheduleController extends Controller
{
    // вывести расписание групповых тренировок
    public function schedules(): JsonResponse{
        return response()->json(Schedule::with('day', 'gym', 'coach', 'workout_type')->get());
    }
}
