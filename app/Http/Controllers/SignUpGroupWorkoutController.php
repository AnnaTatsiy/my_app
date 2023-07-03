<?php

namespace App\Http\Controllers;

use App\Models\LimitedSubscription;
use App\Models\SignUpGroupWorkout;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

class SignUpGroupWorkoutController extends Controller
{
    // получить все записи на групповые тренировки
    public function signUpGroupWorkouts(): JsonResponse{
        return response()->json(SignUpGroupWorkout::with('customer', 'group_workout')->get());
    }
}
