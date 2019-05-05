<?php

use Illuminate\Database\Seeder;

class StatesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $order = App\Order::all()->first();
        $state1 = new App\State;
        $state1 ->stage = 1;
        $state1 ->state = "Offen";
        $state1-> state_comment = "Bestellung erhalten";
        $state1->order()->associate($order);
        $state1->save();

        $state2 = new App\State;
        $state2 ->stage = 2;
        $state2 ->state = "Bezahlt";
        $state2-> state_comment = "Zahlung ist eingegangen";
        $state2->order()->associate($order);
        $state2->save();

        $state2 = new App\State;
        $state2 ->stage = 2;
        $state2 ->state = "Versendet";
        $state2-> state_comment = "Das Paket hat unser Lager verlassen";
        $state2->order()->associate($order);
        $state2->save();
    }
}
