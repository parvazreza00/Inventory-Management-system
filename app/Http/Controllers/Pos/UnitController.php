<?php

namespace App\Http\Controllers\Pos;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Unit;
use Auth;
use Illuminate\Support\Carbon;

class UnitController extends Controller
{
    public function unitAll(){
        $units = Unit::latest()->get();
        return view('backend.unit.unit_all',compact('units'));
    }//end method

    public function unitAdd(){
        return view('backend.unit.unit_add');
    }//end method

    public function unitStore(Request $request){
        Unit::insert([
            'name' => $request->name,
            'created_by' => Auth::user()->id,
            'created_at' => Carbon::now(),
        ]);
        $notification = array(
            'message' => "Unit inserted successfully",
            'alert-type' => 'success',
        );
        return redirect()->route('unit.all')->with($notification);
    }//end method

    public function unitEdit($id){
        $editUnit = Unit::findOrFail($id);
        return view('backend.unit.unit_edit',compact('editUnit'));
    }//end method

    public function unitUpdate(Request $request){
        $unit_id = $request->id;
        Unit::findOrFail($unit_id)->update([
            'name' => $request->name,
            'updated_by'=> Auth::user()->id,
            'updated_at'=>Carbon::now(),
        ]);
        $notification = array(
            'message' => "Unit Updated successfully",
            'alert-type' => 'success',
        );
        return redirect()->route('unit.all')->with($notification);
    }//end method


    public function unitDelete($id){
        Unit::findOrFail($id)->delete();

        $notification = array(
            'message' => "Unit Deleted successfully",
            'alert-type' => 'error',
        );
        return redirect()->back()->with($notification);        
    }
}
