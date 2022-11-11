<?php

namespace App\Http\Controllers\Pos;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\Category;
use App\Models\Suppliers;
use App\Models\Unit;
use Auth;
use Illuminate\Support\Carbon;

class ProductController extends Controller
{
    public function productAll(){
        $productAll = Product::latest()->get();
        return view('backend.product.product_all',compact('productAll'));
    }//end method

    public function productAdd(){
        $suppliers = Suppliers::all();
        $categorys = Category::all();
        $units = Unit::all();

        return view('backend.product.product_add',compact('suppliers','categorys','units'));

    }//end method

    public function productStore(Request $request){
        Product::insert([
            'name' => $request->name,
            'supplier_id' => $request->supplier_id,
            'unit_id' => $request->unit_id,
            'category_id' => $request->category_id,
            'quantity' => '0',
            'created_by' => Auth::user()->id,
            'created_at' => Carbon::now(),
        ]);

        $notification = array(
            'message' => 'Product Inserted Successfully', 
            'alert-type' => 'success'
        );
        return redirect()->route('product.all')->with($notification);
    }//end method

    public function productEdit($id){
        $suppliers = Suppliers::all();
        $categorys = Category::all();
        $units = Unit::all();
        $editProduct = Product::findOrFail($id);
        return view('backend.product.product_edit',compact('editProduct','suppliers','categorys','units'));
    }//end method

    public function productUpdate(Request $request){
        $product_id = $request->id;

        Product::findOrFail($product_id)->update([
            'name' => $request->name,
            'supplier_id' => $request->supplier_id,
            'unit_id' => $request->unit_id,
            'category_id' => $request->category_id,            
            'updated_by' => Auth::user()->id,
            'updated_at' => Carbon::now(),
        ]);

        $notification = array(
            'message' => 'Product Updated Successfully', 
            'alert-type' => 'success'
        );
        return redirect()->route('product.all')->with($notification);
    }//end method

    public function productDelete($id){
        Product::findOrFail($id)->delete();

        $notification = array(
            'message' => 'Product deleted Successfully', 
            'alert-type' => 'success'
        );
        return redirect()->back()->with($notification);
    }



}
