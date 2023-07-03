<?php

namespace App\Http\Controllers;

use App\Models\Coach;
use App\Models\Customer;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

class CustomerController extends Controller
{
    // получить все записи (вывод всех клиентов)
    public function customers(): JsonResponse{
        return response()->json(Customer::all());
    }
}
