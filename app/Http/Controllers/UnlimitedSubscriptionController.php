<?php

namespace App\Http\Controllers;

use App\Models\UnlimitedSubscription;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

class UnlimitedSubscriptionController extends Controller
{
    // получить все записи (вывести все подписки на безлимит абонемент)
    public function unlimitedSubscriptions(): JsonResponse{
        return response()->json(UnlimitedSubscription::with('customer', 'unlimited_price_list')->get());
    }

    //Сторона Администратора: безлимит абонементы данного клиента.
    public function selectUnlimitedSubscriptionsByCustomer(Request $request): JsonResponse{

        $id = $request->input('customer');
        return response()->json(UnlimitedSubscription::with( 'unlimited_price_list', 'subscription_type')->where('customer_id', '=', $id)->get());
    }
}
