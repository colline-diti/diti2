<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;


class ImageUploadController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return response()
     */

    public function img_upload()
    {
        return view('imgUpload');
    }

    /**
     * Write code on Method
     *
     * @return response()
     */

    public function imagestore(Request $request)
    {
        $request->validate([

            'image' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',

        ]);

        $imageName = time().'.'.$request->image->extension();
        
        $request->image->move(public_path('image'),$imageName);

        // Store $imageName name in DATABASE from HERE
        //$salesid = "Item/".time();
        $uploadedby= $request->input('receved_by');
        $date = $request->input('date');
        $receiptStore = array(
            "receipt_image" => $imageName,
            "uploadedby" => $uploadedby,
            "Date_rec" => $date,
            );
        DB::table('receipts_stock')->insert($receiptStore);

        return back()->with('success',"image upload successfully")->with('image',$imageName); ;
    }
}