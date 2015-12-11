<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Http\Requests\DepartmentRequest;
use App\Department;
use Datatables;
class DepartmentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function __construct()
    {
        view()->share('type', 'department');
    }
    public function index()
    {
        //
        $title = "Departments";
        $data = Department::orderBy('id','desc')->get();
        return view('html.department.list',compact('data','title'));

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        $title = "Create Department";
        return view('html.department.add-edit',compact('title'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(DepartmentRequest $request)
    {
        //
        $model = new Department();
        $model->name = $request->txtName;        
        $model->save();
        return redirect()->route('admin.department.index')->with('success','Posted completely!');
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
    public function edit(Department $department)
    {
        $title = "Edit Department";
        return view('html.department.add-edit',compact('department','title'));
    }
    /*
     *update function
     */
    public function update(DepartmentRequest $request, Department $department){        
       
        $department->name = $request->txtName;
        $department->save();
        return redirect()->route('admin.department.index')->with('success','Edited completely!');
    }
    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    
    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */    
    public function destroy(Department $department)
    {
        
        $department->delete();
        return redirect()->route('admin.department.index')->with('success','successfully deleted');
        
    }
    public function clear(Request $request)
    {
        foreach ($request->input('checkbox') as $key => $value) {
            $model = Department::find($value);
            $model->delete();
        }
        return redirect()->route('admin.department.index')->with('success','successfully deleted');
    }
}
