<?php
namespace App\Http\Controllers\Api;
use App\Http\Controllers\Controller;
use App\Models\FunFact;
use Illuminate\Http\Request;
class FunFactController extends Controller {
    public function index(Request $request) {
        $query = FunFact::where('is_active', true)->orderBy('sort_order');
        if ($request->has('type')) $query->where('type', $request->type);
        return response()->json($query->get());
    }
}
