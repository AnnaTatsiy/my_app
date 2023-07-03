<?php

namespace App\Http\Controllers;

use App\Models\SignUpPersonalWorkout;
use App\Models\UnlimitedPriceList;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

class UnlimitedPriceListController extends Controller
{
    // получить все записи (вывести прайс лист на безлимит абонементы)
    public function unlimitedPriceLists(): JsonResponse{
        return response()->json(UnlimitedPriceList::with('subscription_type')->get());
    }
}
