<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use App\Http\Helpers\Utils;
use App\Models\coach;
use App\Models\Customer;
use App\Models\GroupWorkout;
use App\Models\Gym;
use App\Models\Schedule;
use App\Models\UnlimitedPriceList;
use Database\Factories\GroupWorkoutFactory;
use Faker\Generator;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class DatabaseSeeder extends Seeder
{
    public function run(): void
    {
        $faker = app(Generator::class);

        $count_subscription_types = count(Utils::$subscription_types);

        Coach::factory(Utils::$count_coaches)->create();
        Customer::factory(Utils::$count_customers)->create();

        DB::table('days')->insert([
            ['title'=>"ПН"],
            ['title'=>"ВТ"],
            ['title'=>"СР"],
            ['title'=>"ЧТ"],
            ['title'=>"ПТ"],
            ['title'=>"СБ"],
            ['title'=>"ВС"]
        ]);
        DB::table('workout_types')->insert(Utils::$workout_types);
        DB::table('subscription_types')->insert(Utils::$subscription_types);

        for ($i = 1; $i <= Utils::$count_gyms; $i++) {
            $arr_gyms[] = ['title'=>'Спортзал № ' .$i, 'capacity' => $faker->numberBetween(10, 30)];
        }
        DB::table('gyms')->insert($arr_gyms);

        for ($i = 1; $i <= $count_subscription_types; $i++) {
            $arr_un_price_list[] = ['subscription_type_id'=>$i, 'validity_period'=>1, 'price'=>$i*1500];
            $arr_un_price_list[] =  ['subscription_type_id'=>$i, 'validity_period'=>3, 'price'=>$i*1800];
            $arr_un_price_list[] = ['subscription_type_id'=>$i, 'validity_period'=>6, 'price'=>$i*2000];
            $arr_un_price_list[] =  ['subscription_type_id'=>$i, 'validity_period'=>12, 'price'=>$i*2300];
        }
        DB::table('unlimited_price_lists')->insert($arr_un_price_list);

        for ($i = 1; $i <= Utils::$count_coaches; $i++) {
            $arr_lim_price_list[] = ['coach_id' => $i, 'amount_workout' => 8, 'price' => 800 * $i];
            $arr_lim_price_list[] =  ['coach_id' => $i, 'amount_workout' => 12, 'price' => 1000 * $i];
        }
        DB::table('limited_price_lists')->insert($arr_lim_price_list);

        Schedule::factory(85)->create();
        GroupWorkout::factory(4200)->create();

        for ($i = 1; $i <= Utils::$count_customers; $i++) {

            $date = Utils::randomDate((date('Y')-1).'-'.date('m').'-1',date('Y-m-d'));
            $unlimited_price_list_id = $faker->numberBetween(1, 4*$count_subscription_types);

            $arr_un_subscriptions[] = ['customer_id'=>$i, 'unlimited_price_list_id' => $unlimited_price_list_id, 'open'=>$date];

            if($i % 2 != 0) {
                $arr_lim_subscriptions[] = ['customer_id' => $i, 'limited_price_list_id' => $faker->numberBetween(1, 2 * Utils::$count_coaches), 'open' => $date];

                /*
                for ($i = 1; $i <=8; $i++){
                    $arr_sing_personal[] = ['date_begin'=> Utils::randomDateBySeconds($date, 2419200),
                        'time_begin'=> str_pad(rand(9,20), 2, 0, STR_PAD_LEFT).':00',
                        'coach_id'=> $faker->numberBetween(1, Utils::$count_coaches),
                        'customer_id' => $i
                    ];
                }*/
            }/* else{

                $n = rand(6,8);

                $unlimited_price_list = UnlimitedPriceList::with('subscription_type')
                    ->where('id', '=', $unlimited_price_list_id)
                    ->get()[0];
                if($unlimited_price_list->subscription_type_id != 1){
                    $max = Utils::incMonths($date,$unlimited_price_list->validity_period);

                   $group_workout = GroupWorkout::all()->whereBetween('event', [$date, $max]);

                    for ($i = 1; $i <=$n; $i++){
                        $arr_sing_group[] = ['customer_id' => $i, 'group_workout_id' => $faker->randomElements($group_workout)[0]->id];
                    }
                }
            } */
        }

        DB::table('unlimited_subscriptions')->insert($arr_un_subscriptions);
        DB::table('limited_subscriptions')->insert($arr_lim_subscriptions);
        //DB::table('sign_up_group_workouts')->insert($arr_sing_group);
        //DB::table('sign_up_personal_workouts')->insert($arr_sing_personal);

    }

}
