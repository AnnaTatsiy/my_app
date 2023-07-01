<?php

namespace App\Http\Helpers;

class Utils
{

    public static int $count_customers = 100;
    public static int $count_coaches = 20;
    public static int $count_gyms = 8;

    //Отчества для фабрики клиенты и тренеры
    public static array $patronymic = ["Мирославов", "Константинов",
        "Тимофеев", "Владимиров", "Марков",
        "Ярославов", "Даниилов", "Давидов", "Ибрагимов",
        "Андреев", "Фёдоров", "Артёмов", "Александров", "Демидов",
        "Артёмов", "Давидов", "Арсентьев", "Маратов", "Даниилов",
        "Егоров", "Вадимов", "Сергеев"];

    public static array $workout_types = [
        ['title'=>"Аэробика"],
        ['title'=>"Кикбоксинг"],
        ['title'=>"Тай-бо"],
        ['title'=>"Кангу Джампс"],
        ['title'=>"Body Sculpt"],
        ['title'=>"Йога"],
        ['title'=>"Body Pump"],
        ['title'=>"Круговой тренинг"],
        ['title'=>"Тренировка с петлями"],
        ['title'=>"Кроссфит"],
        ['title'=>"Пилатес"],
        ['title'=>"Зумба"],
        ['title'=>"Стретчинг"],
        ['title'=>"Бодифлекс"]
    ];

    //генератор случайной даты в диапазон
    public static function randomDate($start_date, $end_date): string
    {
        // Convert to timetamps
        $min = strtotime($start_date);
        $max = strtotime($end_date);

        // Generate random number using above bounds
        $val = rand($min, $max);

        // Convert back to desired date format
        return date('Y-m-d', $val);
    }

    //генератор случайной даты в диапазон (первый параметр дата, второй секунды)
    public static function randomDateBySeconds($start_date, $max): string
    {
        // Convert to timetamps
        $min = strtotime($start_date);

        // Generate random number using above bounds
        $val = rand($min, $max);

        // Convert back to desired date format
        return date('Y-m-d', $val);
    }

    //Прибавить к дате месяцы
    public static function incMonths($start_date, $count) : string
    {
        return date("Y-m-d", strtotime("+".$count." month", strtotime($start_date)));
    }


    public static array $subscription_types = [
        ['title' => 'Простой', 'spa' => false, 'pool' => false, 'group' => false],
        ['title' => 'Простой+', 'spa' => false, 'pool' => false, 'group' => true],
        ['title' => 'Умный', 'spa' => false, 'pool' => true, 'group' => true],
        ['title' => 'Все включено', 'spa' => true, 'pool' => true, 'group' => true]
    ];

}
