<?php

namespace App\Http\Controllers;

use App\Models\LimitedSubscription;
use App\Models\UnlimitedSubscription;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

class UnlimitedSubscriptionController extends Controller
{
    // получить все записи (вывести все подписки на безлимит абонемент)
    public function unlimitedSubscriptions(): JsonResponse{
        return response()->json(UnlimitedSubscription::with('customer', 'unlimited_price_list')->get());
    }
}
