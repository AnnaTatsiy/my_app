<?php

namespace App\Http\Controllers;

use App\Models\Coach;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

class CoachController extends Controller {

    // получить все записи (вывод всех тренеров)
    public function coaches(): JsonResponse{
        return response()->json(Coach::all());
    }
}
