<?php
namespace App\Http\Controllers\Api;
use App\Http\Controllers\Controller;
use App\Models\Goodie;
use Illuminate\Http\Request;
class GoodieController extends Controller {
    public function index(Request $request) {
        $query = Goodie::orderBy('sort_order');
        if ($request->has('category')) $query->where('category', $request->category);
        return response()->json($query->get());
    }
}
