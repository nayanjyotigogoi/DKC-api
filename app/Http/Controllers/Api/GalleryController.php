<?php
namespace App\Http\Controllers\Api;
use App\Http\Controllers\Controller;
use App\Models\GalleryPhoto;
use Illuminate\Http\Request;
class GalleryController extends Controller {
    public function index(Request $request) {
        $query = GalleryPhoto::where('is_visible', true)->orderBy('sort_order');
        if ($request->has('category')) $query->where('category', $request->category);
        return response()->json($query->get());
    }
}
