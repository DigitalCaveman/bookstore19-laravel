<?php

namespace App\Http\Controllers;

use App\Book;
use App\Order;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class OrderController extends Controller
{
    public function index() {
        $orders = Order::with('books')->get();
        return $orders;
    }

    public function ordersFromUser(string $user_id) {
        $orders = Order::with('books')->where('user_id', '=', $user_id)->get();
        return $orders;
    }

    public function findById (string $id) {
        $order = Order::where('id', $id)
            ->with(['books'])
            ->first();
        return $order;
    }

    public function save(Request $request) : JsonResponse  {

        /**
         *  use a transaction for saving model including relations
         * if one query fails, complete SQL statements will be rolled back
         */
        DB::beginTransaction();
        try {
            $order = Order::create($request->all());
            if (isset($request['books']) && is_array($request['books'])) {
                foreach ($request['books'] as $_book) {
                    $book = Book::where('isbn', '=', $_book['isbn'])->first();
                    if ($book)
                        $order->books()->save($book);
                }
            }

            DB::commit();
            // return a vaild http response
            return response()->json($order, 201);
        }
        catch (\Exception $e) {
            // rollback all queries
            DB::rollBack();
            return response()->json("saving order failed: " . $e->getMessage(), 420);
        }
    }

    public function delete(string $id) : JsonResponse {
        $order = Order::where('id', $id)->first();
        if ($order != null) {
            $order->delete();
        }
        else {
            throw new \Exception("Order couldn't be deleted - does not exist");
        }
        return response()->json('Order ID: ' . $id . ' deleted', 200);
    }
}
