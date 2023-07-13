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
Route::get('/coaches/get-all', [CoachController::class, 'coachesAll']);
// получить все записи (вывод всех тренеров) постранично
Route::get('/coaches/all', [CoachController::class, 'coaches']);
// сохранить тренера в бд
Route::post('/coaches/add', [CoachController::class, 'addCoach']);
// редактирование тренера в бд
Route::post('/coaches/edit', [CoachController::class, 'editCoach']);

// получить все записи (вывод всех клиентов)
Route::get('/customers/get-all', [CustomerController::class, 'customersAll']);
// получить все записи (вывод всех клиентов) постранично
Route::get('/customers/all', [CustomerController::class, 'customers']);
// сохранить клиента в бд
Route::post('/customers/add', [CustomerController::class, 'addCustomer']);
// редактирование клиента в бд
Route::post('/customers/edit', [CustomerController::class, 'editCustomer']);
// поиск клиента по серии-номеру паспорта
Route::post('/customers/select-customers-by-passport', [CustomerController::class, 'getCustomersByPassport']);

// получить все записи (вывод всех групповых тренировок)
Route::get('/group-workouts/all', [GroupWorkoutController::class, 'groupWorkouts']);

// получить все записи (вывести прайс лист на тренировки с тренерами)
Route::get('/limited-price-lists/all', [LimitedPriceListController::class, 'limitedPriceLists']);

// получить все записи (вывести все подписки на тренировки с тренерами)
Route::get('/limited-subscriptions/all', [LimitedSubscriptionController::class, 'limitedSubscriptions']);

// вывести расписание групповых тренировок
Route::get('/schedules/all', [ScheduleController::class, 'schedulesGetAll']);

// получить все записи на групповые тренировки
Route::get('/sign-up-group-workouts/all', [SignUpGroupWorkoutController::class, 'signUpGroupWorkouts']);

// получить все записи на персональные тренировки
Route::get('/sign-up-personal-workouts/all', [SignUpPersonalWorkoutController::class, 'signUpPersonalWorkouts']);

// получить все записи (вывести прайс лист на безлимит абонементы)
Route::get('/unlimited-price-lists/all', [UnlimitedPriceListController::class, 'unlimitedPriceLists']);

// получить все записи (вывести все подписки на безлимит абонемент)
Route::get('/unlimited-subscriptions/all', [UnlimitedSubscriptionController::class, 'unlimitedSubscriptions']);

// Сторона Администратора: безлимит абонементы данного клиента.
Route::post('/unlimited-subscriptions/select-unlimited-subscriptions-by-customer', [UnlimitedSubscriptionController::class, 'selectUnlimitedSubscriptionsByCustomer']);

// Сторона Администратора: купленные тренировки данного клиента.
Route::post('/limited-subscriptions/select-limited-subscriptions-by-customer', [LimitedSubscriptionController::class, 'selectLimitedSubscriptionsByCustomer']);

