<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\CurdRequest;
use App\Models\Curd;
use App\Models\type;

class CurdController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

   public function index(){
    $type= type::all();
    return view('curd.store', compact('type'));
   }
   public function featch_data(){
        $data = Curd::all();
        return view('home', compact('data'));
   }
   public function store(CurdRequest $request){
   // dd($request->image);
        $image = $this->file_upload($request->file('image'),'CurdImg');
        $data = Curd::create([
            'name' => $request->name,
            'name' => $request->address,
            'type_id' => $request->type,
            'image' => $image,
        ]);
        if($data){
            return redirect()->back()->with('success','data has Been Saved');
        }else{
            return redirect()->back()->with('error','Something Error');
        }
   }
}
