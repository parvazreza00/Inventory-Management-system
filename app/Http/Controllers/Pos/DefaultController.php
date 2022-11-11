<?php

namespace App\Http\Controllers\Pos;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Purchase;
use App\Models\Product;
use App\Models\Category;
use App\Models\Suppliers;
use App\Models\Unit;
use Auth;
use Illuminate\Support\Carbon;

class DefaultController extends Controller
{
    public function GetCategory(Request $request){
        $supplier_id = $request->supplier_id;
        // dd($supplier_id);
        $allCategory = Product::with(['category'])->select('category_id')->where('supplier_id',$supplier_id)->groupBy('category_id')->get();
        return response()->json($allCategory);

    }//end mehtod

    public function GetProduct(Request $request){
        $category_id = $request->category_id;
        // dd($supplier_id);
        $allProduct = Product::where('category_id',$category_id)->get();
        return response()->json($allProduct);

    }
}
