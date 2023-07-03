<?php

namespace App\Http\Controllers;

use App\Models\GroupWorkout;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

class GroupWorkoutController extends Controller
{
    // получить все записи (вывод всех групповых тренировок)
    public function groupWorkouts(): JsonResponse{
        return response()->json(GroupWorkout::with('schedule')->get());
    }
}
