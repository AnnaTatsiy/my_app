<?php

namespace App\Http\Controllers;

use App\Models\LimitedPriceList;
use App\Models\LimitedSubscription;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

class LimitedSubscriptionController extends Controller
{
    // получить все записи (вывести все подписки на тренировки с тренерами)
    public function limitedSubscriptions(): JsonResponse{
        return response()->json(LimitedSubscription::with('customer', 'limited_price_list')->get());
    }
}
