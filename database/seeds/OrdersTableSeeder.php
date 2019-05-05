<?php

use App\Book;
use App\Order;
use App\User;
use Illuminate\Database\Seeder;

class OrdersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //Order1
        $user1 = App\User::all()->get(0);
        $user2 = App\User::all()->get(1);

        $order1 = new App\Order;
        $order1->total_price = 10;
        $order1->gross = 10;
        $order1->net = 10;
        $order1->user()->associate($user1);
        $order1->save();

        $book = App\Book::all()->first();
        $order1 = App\Order::all()->get(0);
        $order1->books()->save($book);


        //Order2
        $order2 = new App\Order;
        $order2->total_price = 20;
        $order2->gross = 20;
        $order2->net = 18;
        $order2->user()->associate($user1);
        $order2->save();

        $book2 =  App\Book::all()->get(1);
        $order2 = App\Order::all()->get(1);
        $this->command->info($order2);
        $order2->books()->save($book);
        $order2->books()->save($book2);

        //Order3
        $order3 = new App\Order;
        $order3->total_price = 50;
        $order3->gross = 48;
        $order3->net = 50;
        $order3->user()->associate($user2);
        $order3->save();

        $book3 =  App\Book::all()->get(1);
        $order3 = App\Order::all()->get(2);
        $this->command->info($order3);
        $order3->books()->save($book3);
    }
}
