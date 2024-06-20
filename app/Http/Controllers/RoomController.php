<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Rooms;
use Illuminate\Support\Carbon;
use Image;

class RoomController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

    }
    public function getAllRoom()
    {
        // retrun room
        $roomlist = Rooms::all();
        return  response()->json([
        'ListRoom'=>$roomlist
        ],200) ;       
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // เพิ่มข้อมูลห้องใหม่  INSERT  ROOM 
        $newItem  = new Rooms;
               
        $tokenMD5 = md5($request->rommFullName);
        $newItem->roomToken = $tokenMD5;
        $newItem->roomFullName = $request->roomFullName;
        $newItem->roomTitle = $request->roomTitle;
        $newItem->roomSize = $request->roomSize;
        $newItem->roomTypeId = $request->roomTypeId;
        $newItem->placeId = $request->placeId;
        $newItem->roomDetail = $request->roomDetail;
        if($request->thumbnail !=""){
            $strpos = strpos($request->thumbnail,';');
            $sub =  substr($request->thumbnail,0,$strpos);
            $ex = explode('/',$sub)[1];
            $name = time().".".$ex ;
            $img = Image :: make($request->thumbnail)->resize(200,200);            
            $upload_path = public_path()."/upload/";
            $img->save($upload_path,$name);
            $newItem->thumbnail = $name;
        }else {
            $newItem->thumbnail = "image.png";
        }

         $newItem->save();
          return response()->json('Rooms updated');
       // return  $newItem;
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function updateStatus(Request $request, $id)
    {
        //  Update 
        $exitingItem = Rooms::find($id);
        if ($exitingItem) {
            $exitingItem->is_status = $request->data['isStatus'];
            $exitingItem->save();        
            return response()->json('Rooms Staus updated ');
        }
        return "Rooms Not found.";
    }
    public function update(Request $request, $id)
    {
        //  Update 
        $exitingItem = Rooms::find($id);
        if ($exitingItem) {
            $exitingItem->roomFullName = $request->data['roomFullName'];
            $exitingItem->roomTitle = $request->data['roomTitle'];
            $exitingItem->roomSize = $request->data['roomSize'];
            $exitingItem->roomTypeId = $request->data['roomTypeId'];
            $exitingItem->placeId = $request->data['placeId'];
            $exitingItem->roomDetail = $request->data['roomDetail'];
            //$exitingItem->thumbnail = $request->data['thumbnail'];        
            $exitingItem->save();
            return response()->json('Rooms updated');
        }
        return "Rooms Not found.";
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)    {
        //
        $exitingItem = Rooms::find($id);
        if ($exitingItem) {
            $exitingItem->delete();        
            return response()->json('Rooms successfully deleted. ');
        }
        return "Rooms Not found.";
    }
}
