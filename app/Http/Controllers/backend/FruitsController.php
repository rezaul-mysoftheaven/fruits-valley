<?php

namespace App\Http\Controllers\backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Fruits;
use File;

class FruitsController extends Controller
{
    //SHow All Fruits and Manage them
    public function manage_fruits()
    {
        $fruits = Fruits::all()->where('fr_soft_delete', '0');
        return view('backend.manage_fruits', ['fruits' => $fruits]);
    }

    //Show Add Fruits Form
    public function add_fruits(){
        return view('backend.add_fruits');
    }


   //Store the fruit item on database
    public function fr_store(Request $request)
    {
        $fruit = new Fruits();

        $fruit->fr_name = $request->fr_name;
        $fruit->fr_qty = $request->fr_qty;
        $fruit->fr_old_price = $request->fr_old_price;
        $fruit->fr_cur_price = $request->fr_cur_price;
        
        if ($img = $request->file('fr_img')) {
            $fr_name_cleaned = preg_replace('/[^A-Za-z0-9\-]/', '', $request->fr_name); // Remove spaces and special characters
            $img_name = $fr_name_cleaned . uniqid() . '.' . $img->getClientOriginalExtension();
            $img->move('uploads/fruits', $img_name);
            $fruit->fr_img = $img_name;
        }
        
        $fruit->save();
        
        return back()->with('fr_added', 'Successfully Added a New Fruit!');

    }

    //Available to Unavailable a Fruit Item
    public function avl_to_unavl($id){
        $item = Fruits::find($id);
        $item->fr_availability = 0;
        $item->update();
        return back();
    }

    //Unavailable to Available a Fruit Item
    public function unavl_to_avl($id){
        $item = Fruits::find($id);
        $item->fr_availability = 1;
        $item->update();
        return back();
    }

    //Soft Delete a Product
    public function fr_soft_delete($id){
        $item = Fruits::find($id);
        $item->fr_soft_delete = 1;
        $item->update();
        return back()->with('fr_soft_delete', 'One item is Moved to Trash!'); 
    }

    //To Show Trash Manager Page
    public function trash_manage_fruits(){
        $fruits = Fruits::all()->where('fr_soft_delete', '1');
        return view('backend.trash_manage_fruits', compact('fruits'));
    }

    //Restore From Trash Bin
    public function restore_fruits($id){
        $item = Fruits::find($id);
        $item->fr_soft_delete = 0;
        $item->update();
        return back()->with('restore_fruits', 'One item is Restored from Trash!'); 
    }

    //Delete a Product
    public function fr_delete($id){
        $item = Fruits::find($id);
        if($item){
            $del_img = 'uploads/fruits/'.$item->fr_img;
            if(file_exists($del_img)){
                File::delete($del_img);
            }
            $item->delete();
        }
        return back()->with('fr_del', 'One Item is Successfully Deleted!');
    }


    
    //Show the form for editing the specified resource.
    
    public function edit_fruit($id)
    {
        $fruit = Fruits::find($id);
        return view('backend.edit_fruit', compact('fruit'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update_fruit(Request $request, $id)
    {
        // echo $id." asi re vaai asi";
        $item = Fruits::find($id);
        
        $item->fr_name = $request->fr_name;
        $item->fr_qty = $request->fr_qty;
        $item->fr_old_price = $request->fr_old_price;
        $item->fr_cur_price = $request->fr_cur_price;

        $old_img = 'uploads/fruits/'.$item->fr_img;
        $new_img = $request->file('fr_img');

        if($new_img){
            if(file_exists($old_img)){
                File::delete($old_img);
            }
            $fr_name_cleaned = preg_replace('/[^A-Za-z0-9\-]/', '', $request->fr_name); // Remove spaces and special characters
            $new_img_name = $fr_name_cleaned . uniqid() . '.' . $new_img->getClientOriginalExtension();

            $new_img->move('uploads/fruits/', $new_img_name);
            $item->fr_img = $new_img_name;
        }

        $item->update();

        return redirect()->route('manage_fruits')->with('update_fruit', 'One item is Successfully Updated!!!');
    }

}
