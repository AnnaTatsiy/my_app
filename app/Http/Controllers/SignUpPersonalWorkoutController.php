<?php

namespace App\Http\Controllers;

use App\Models\SignUpPersonalWorkout;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

class SignUpPersonalWorkoutController extends Controller
{
    // получить все записи на персональные тренировки
    public function signUpPersonalWorkouts(): JsonResponse{
        return response()->json(SignUpPersonalWorkout::with('customer', 'coach')->get());
    }
}
