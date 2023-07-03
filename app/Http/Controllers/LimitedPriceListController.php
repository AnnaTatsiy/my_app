<?php

namespace App\Http\Controllers;

use App\Models\GroupWorkout;
use App\Models\LimitedPriceList;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

class LimitedPriceListController extends Controller
{
    // получить все записи (вывести прайс лист на тренировки с тренерами)
    public function limitedPriceLists(): JsonResponse{
        return response()->json(LimitedPriceList::with('coach')->get());
    }
}
