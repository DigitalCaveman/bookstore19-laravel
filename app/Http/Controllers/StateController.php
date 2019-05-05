<?php

namespace App\Http\Controllers;

use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

use App\State;
use Illuminate\Support\Facades\DB;

class StateController extends Controller
{
    public function index() {
        $states = State::all();
        return $states;
    }

    public function getSingle(string $order_id) {
        $state = State::where('order_id', '=', $order_id)->get();
        return $state;
    }

    public function save(Request $request) : JsonResponse
    {

        /**
         *  use a transaction for saving model including relations
         * if one query fails, complete SQL statements will be rolled back
         */

        DB::beginTransaction();
        try {
            $status = State::create($request->all());
            DB::commit();
            return response()->json($status, 201);
        } catch (\Exception $e) {
            DB::rollBack();
            return response()->json("updating status failed: " . $e->getMessage(), 420);
        }
    }
}
