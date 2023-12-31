<?php

namespace App\Http\Controllers;

use App\Models\LimitedPriceList;
use App\Models\LimitedSubscription;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

class LimitedSubscriptionController extends Controller
{
    // получить все записи (вывести все подписки на тренировки с тренерами)
    public function getLimitedSubscriptions(): JsonResponse{
        return response()->json(LimitedSubscription::with('customer', 'limited_price_list', 'coach')->orderByDesc('open')->get());
    }

    // получить все записи (вывести все подписки на тренировки с тренерами) постранично
    public function limitedSubscriptions(): JsonResponse{
        return response()->json(LimitedSubscription::with('customer', 'limited_price_list', 'coach')->orderByDesc('open')->paginate(12));
    }

    //Сторона Администратора: купленные тренировки данного клиента.
    public function selectLimitedSubscriptionsByCustomer(Request $request): JsonResponse{
        $id = $request->input('customer');
        return response()->json(LimitedSubscription::with( 'limited_price_list', 'coach')->where('customer_id', '=', $id)->get());
    }
}
