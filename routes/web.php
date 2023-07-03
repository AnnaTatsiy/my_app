<?php

use App\Http\Controllers\CoachController;
use App\Http\Controllers\CustomerController;
use App\Http\Controllers\GroupWorkoutController;
use App\Http\Controllers\LimitedPriceListController;
use App\Http\Controllers\LimitedSubscriptionController;
use App\Http\Controllers\ScheduleController;
use App\Http\Controllers\SignUpGroupWorkoutController;
use App\Http\Controllers\SignUpPersonalWorkoutController;
use App\Http\Controllers\UnlimitedPriceListController;
use App\Http\Controllers\UnlimitedSubscriptionController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

// получить все записи (вывод всех тренеров)
Route::get('/coaches/all', [CoachController::class, 'coaches']);

// получить все записи (вывод всех клиентов)
Route::get('/customers/all', [CustomerController::class, 'customers']);

// получить все записи (вывод всех групповых тренировок)
Route::get('/group-workouts/all', [GroupWorkoutController::class, 'groupWorkouts']);

// получить все записи (вывести прайс лист на тренировки с тренерами)
Route::get('/limited-price-lists/all', [LimitedPriceListController::class, 'limitedPriceLists']);

// получить все записи (вывести все подписки на тренировки с тренерами)
Route::get('/limited-subscriptions/all', [LimitedSubscriptionController::class, 'limitedSubscriptions']);

// вывести расписание групповых тренировок
Route::get('/schedules/all', [ScheduleController::class, 'schedules']);

// получить все записи на групповые тренировки
Route::get('/sign-up-group-workouts/all', [SignUpGroupWorkoutController::class, 'signUpGroupWorkouts']);

// получить все записи на персональные тренировки
Route::get('/sign-up-personal-workouts/all', [SignUpPersonalWorkoutController::class, 'signUpPersonalWorkouts']);

// получить все записи (вывести прайс лист на безлимит абонементы)
Route::get('/unlimited-price-lists/all', [UnlimitedPriceListController::class, 'unlimitedPriceLists']);

// получить все записи (вывести все подписки на безлимит абонемент)
Route::get('/unlimited-subscriptions/all', [UnlimitedSubscriptionController::class, 'unlimitedSubscriptions']);
