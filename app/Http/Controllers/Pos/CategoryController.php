<?php

namespace App\Http\Controllers\Pos;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Category;
use Auth;
use Illuminate\Support\Carbon;

class CategoryController extends Controller
{
    public function categoryAll(){
        $category = Category::latest()->get();
        return view('backend.category.category_all',compact('category'));
    }//end method

    public function categoryAdd(){
        return view('backend.category.category_add');
    }//end method

    public function categoryStore(Request $request){
        Category::insert([
            'name' => $request->name,
            'created_by' => Auth::user()->id,
            'created_at' => Carbon::now(),
        ]);
        $notification = array(
            'message' => "Category Inserted successfully",
            'alert-type' => 'success',
        );
        return redirect()->route('category.all')->with($notification);
    }//end method

    public function categoryEdit($id){
        $editCategory = Category::findOrFail($id);
        return view('backend.category.category_edit',compact('editCategory'));
    }//end mehtod

    public function categoryUpdate(Request $request){
        $category_id = $request->id;

        Category::findOrFail($category_id)->update([
            'name' => $request->name,
            'updated_by' => Auth::user()->id,
            'updated_at' => Carbon::now(),
        ]);
        $notification = array(
            'message' => "Category Updated successfully",
            'alert-type' => 'success',
        );
        return redirect()->route('category.all')->with($notification);
    }//end method

    public function categoryDelete($id){
        Category::findOrFail($id)->delete();

        $notification = array(
            'message' => "Category Deleted successfully",
            'alert-type' => 'success',
        );
        return redirect()->back()->with($notification);
    }
}
