<?php

namespace App\Http\Controllers;

use App\Models\Curd;
use App\Models\type;
use Illuminate\Http\Request;
use App\Http\Requests\CurdRequest;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
         $data = Curd::all();
         return view('home',compact('data'));
    }

    public function create(){
        $type= type::all();
        return view('curd.store', compact('type'));
    }

    public function store(CurdRequest $request){
    // dd($request->image);
        $image = $this->file_upload($request->file('image'),'CurdImg');
        $data = Curd::create([
            'name' => $request->name,
            'address' => $request->address,
            'type_id' => $request->type,
            'image' => $image,
        ]);
        if($data){
            return redirect()->back()->with('success','data has Been Saved');
        }else{
            return redirect()->back()->with('error','Something Error');
        }
    }

    public function edit($id){
        $curd = Curd::findOrFail($id);
        $type = type::all();
        return view('curd.edit', compact('curd','type'));
    }

    public function update(CurdRequest $request, $id){
        $update_data = Curd::findOrFail($id);
        if($request->hasFile('image')){
            $image = $this->file_update($request->file('image'),'CurdImg',$update_data->image);
        }else{
            $image = $update_data->image;
        }

        $data = $update_data->update([
            'name' => $request->name,
            'address' => $request->address,
            'type_id' => $request->type,
            'image' => $image,
        ]);
        if($data){
            return redirect()->back()->with('success','data has Been updated');
        }else{
            return redirect()->back()->with('error','Something Error');
        }

    }

    function delete($id){
        $delete_id = Curd::findOrFail($id);
        $output= $delete_id->delete();
        if($output){
            return redirect()->back()->with('success','data has Been Delete');
        }else{
            return redirect()->back()->with('error','Something Error');
        }
    }
}
