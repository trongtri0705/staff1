<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
// use Request;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Http\Requests\ReviewRequest;
use App\Review,App\Role,Auth;
class ReviewController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $title = "Review";       
        return view('html.review.list',compact('data','title'));
    }
    public function getReview($id)
    {
        $title = "Create Review"; 
        $model = new Review;      
        return view('html.review.add-edit',compact('title','model','id'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $title = "Create Review"; 
        $model = new Review;      
        return view('html.review.add-edit',compact('title','model'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function postReview(Request $request,$id)
    {                   
        $model = new Review;
        $model->staff_id = $id;
        $model->reviewer_id = Auth::user()->id;
        $model->point = $request->point;
        $model->comment = $request->content;
        $model->save();
        return redirect()->route('admin.index')->with('success','Added completely!');
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
    public function edit(Level $level)
    {
        $title = "Edit Level";
        $role = Role::where('id','<>','4')->get();
        return view('html.level.add-edit',compact('level','role','title'));
    }
    /*
     *update function
     */
    public function update(LevelRequest $request, Level $level){        
       
        $level->name = $request->txtName;
        $level->role_id = $request->sltRole;
        $level->save();
        return redirect()->route('admin.level.index')->with('success','Edited completely!');
    }
    public function destroy(Level $level){
        $level->delete();
        return redirect()->route('admin.level.index')->with('success','Deleted completely!');
    }
    public function clear(Request $request)
    {
        foreach ($request->input('checkbox') as $key => $value) {
            $model = Level::find($value);
            $model->delete();
        }
        return redirect()->route('admin.level.index')->with('success','successfully deleted');
    }
}
