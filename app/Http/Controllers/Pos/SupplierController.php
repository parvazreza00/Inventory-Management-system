<?php

namespace App\Http\Controllers\Pos;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Suppliers;
use Auth;
use Illuminate\Support\Carbon;

class SupplierController extends Controller
{
    public function supplierAll(){
        $suppliers = Suppliers::latest()->get();
        return view('backend.supplier.supplier_all',compact('suppliers'));
    }

    public function supplierAdd(){
        return view('backend.supplier.supplier_add');
    }

    public function supplierStore(Request $request){
        Suppliers::insert([
            'name' => $request->name,
            'mobile_no' => $request->mobile_no,
            'email' => $request->email,
            'address' => $request->address,
            'created_by' => Auth::user()->id,
            'created_at' => Carbon::now(),
        ]);

        $notification = array(
            'message' => "Supplier inserted successfully",
            'alert-type' => 'success',
        );
        return redirect()->route('supplier.all')->with($notification);
    }

    public function supplierEdit($id){
        $editSupplier = Suppliers::findOrFail($id);
        return view('backend.supplier.supplier_edit',compact('editSupplier'));
    }

    public function supplierUpdate(Request $request){
        $supplier_id = $request->id;

        Suppliers::findOrFail($supplier_id)->update([
            'name' => $request->name,
            'mobile_no' => $request->mobile_no,
            'email' => $request->email,
            'address' => $request->address,
            'updated_by' => Auth::user()->id,
            'updated_at' => Carbon::now(),
        ]);
        $notification = array(
            'message' => "Supplier Updated successfully",
            'alert-type' => 'success',
        );
        return redirect()->route('supplier.all')->with($notification);
    }

    public function supplierDelete($id){
        Suppliers::findOrFail($id)->delete();

        $notification = array(
            'message' => 'Supplier Deleted Successfully', 
            'alert-type' => 'success'
        );
        return redirect()->back()->with($notification);
    }
}
