<?php
namespace App\Http\Controllers\Api;
use App\Http\Controllers\Controller;
use App\Models\GoodieOrder;
use Illuminate\Http\Request;

class GoodieOrderController extends Controller {
    public function store(Request $request) {
        $data = $request->validate([
            'name'        => 'required|string|max:255',
            'email'       => 'required|email|max:255',
            'roll_number' => 'nullable|string|max:100',
            'phone'       => 'nullable|string|max:30',
            'items'       => 'required|array|min:1',
            'items.*.id'  => 'required',
            'items.*.name'=> 'required|string',
            'items.*.price'=> 'required|string',
            'notes'       => 'nullable|string|max:2000',
        ]);

        $order = GoodieOrder::create($data);

        return response()->json(['success' => true, 'id' => $order->id], 201);
    }
}
