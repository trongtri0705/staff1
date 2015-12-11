<?php namespace App\Http\Controllers;
use App\User,Auth,Hash;
use App\Http\Requests;
use App\Department;
use Illuminate\Http\Request;
use App\Http\Requests\ChangePassRequest;
class HomeController extends Controller {

	/*
	|--------------------------------------------------------------------------
	| Home Controller
	|--------------------------------------------------------------------------
	|
	| This controller renders your application's "dashboard" for users that
	| are authenticated. Of course, you are free to change or remove the
	| controller as you wish. It is just here to get your app started!
	|
	*/

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
	 * Show the application dashboard to the user.
	 *
	 * @return Response
	 */
	public function index()
	{
		$title = "Dashboard";
		if(Auth::user()->role_id==4)
		{
			$model = Department::with(['user','developer','leader','manager'])->get();		
			return view('html.dashboard.admin',compact('title','model'));
		}
		elseif (Auth::user()->role_id==3) {
			return view('html.dashboard.manager',compact('title','model'));
		}
		elseif (Auth::user()->role_id==2) {
			$list = \App\Team::where('created_user_id',Auth::user()->id)->with('detail')->first();
			return view('html.dashboard.leader',compact('title','list'));
		}
		else {
			$var = \App\TeamDetail::select('team_id')->where('staff_id',Auth::user()->id)->first();
			$bol="";			
			if($var!=null)
			{
				$team = \App\Team::find($var->team_id);				
				$leader = User::find($team->created_user_id);
				$bol = "true";
				$list = \App\TeamDetail::select('*')->where('staff_id','<>',Auth::user()->id)->where('team_id',$var->team_id)->get();				
			}	
			return view('html.dashboard.developer',compact('title','list','bol','leader'));
		}
	}
	public function getChangePassword()
	{
		$id = Auth::user()->id;
		$model = User::find($id);
		$title = "Change Password";
		return view('html.changepassword',compact('model','title'));

	}
	public function postChangePassword(ChangePassRequest $request)
	{	
		
		if(!Hash::check($request->txtOldPass,Auth::user()->password))
			return redirect()->back()->withErrors(['Wrong Password']);
		else{
			$user = Auth::user();
        	$pass = $request->txtPass;
            $user->password = Hash::make($pass);
            $user->remember_token = Request::input('_token');
	        $user->save();
			return redirect()->intended()->with('success','Finished');                       
       } 
	}
	public function getCreateManager()
	{
		if(\Auth::user()->role_id !=4)
        {
            return view('html.error-403');
        }
		$title = "Managers";
		$developer = User::where('role_id','<',3)->get();
		return view('html.team.admin.create-manager',compact('title','developer'));
	}
	public function getCreateLeader()
	{
		if(\Auth::user()->role_id < 3)
        {
            return view('html.error-403');
        }
		$title = "Leaders";
		$developer = User::where('role_id',1)->get();
		return view('html.team.admin.create-leader',compact('title','developer'));
	}
	public function postCreateManager(Request $request)
	{
		$this->validate($request,
            ['staff'=>'required'],
            ['staff.required'=>'Please select staff']);
		foreach ($request->input('staff') as $key => $value)
        {
            $user = User::find($value);
            $user->role_id = 3;
            $user->save();
        }
        return redirect()->route('admin.team.manager.index')->with('success','Added completely!');
	}
	public function postCreateLeader(Request $request)
	{
		$this->validate($request,
            ['staff'=>'required'],
            ['staff.required'=>'Please select staff']);
		foreach ($request->input('staff') as $key => $value)
        {
            $user = User::find($value);
            $user->role_id = 2;
            $user->save();
        }
        return redirect()->route('admin.team.leader.index')->with('success','Added completely!');
	}
	public function getLeader()
	{
		
	}
	public function getManager()
	{
		
	}
	public function createManager()
	{
		
	}
}
