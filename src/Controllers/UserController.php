<?php namespace Genetsis\Admin\Controllers;

use App\Models\Action;
use Genetsis\Admin\Models\Role;
use Genetsis\Admin\Models\User;
use Genetsis\Druid\Rest\RestApi;
use Illuminate\Http\Request;
use Yajra\DataTables\DataTables;

class UserController extends AdminController
{
    public function __construct()
    {
        parent::__construct();
        \View::share('section', 'users');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $data = User::orderBy('id','DESC')->paginate(5);
        return view('genetsis-admin::pages.users.index',compact('data'))
            ->with('i', ($request->input('page', 1) - 1) * 20);
    }


    /**
     * Api for Datatable - get Users
     * @return mixed
     * @throws \Exception
     */
    public function get(Request $request) {
        if ($request->ajax()) {
            $users = User::all();
                //->with('druid_app','parties');

            return DataTables::of($users)
                ->addColumn('options', function ($user) {
                    return '
                        <div class="actions" style="width:64px">
                        <a class="actions__item zmdi zmdi-eye" href="'.route('users.show',$user->id).'"></a>
                        <a class="actions__item zmdi zmdi-edit" href="'.route('users.edit',$user->id).'"></a>
                        </div>                        
                        ';
                })
                ->addColumn('delete', function ($user) {
                    return '
                        <div class="actions">                                                
                        <a class="actions__item zmdi zmdi-delete del" data-id="'.$user->id.'"></a>
                        </div>                        
                        ';
                })
                ->rawColumns(['options','delete'])
                ->make(true);
        }
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $roles = Role::pluck('name','name')->all();
        return view('genetsis-admin::pages.users.create',compact('roles'));
    }


    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'name' => 'required',
            'email' => 'required|email|unique:users,email',
            'password' => 'required|same:confirm-password',
            'roles' => 'required'
        ]);

        $input = $request->all();
        $input['password'] = bcrypt($input['password']);

        $user = User::create($input);
        $user->assignRole($request->input('roles'));


        return redirect()->route('users.home')
            ->with('success','User created successfully');
    }


    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $user = User::find($id);
        return view('genetsis-admin::pages.users.show',compact('user'));
    }


    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $user = User::find($id);
        $roles = Role::pluck('name','name')->all();
        $userRole = $user->roles->pluck('name','name')->all();

        return view('genetsis-admin::pages.users.edit',compact('user','roles','userRole'));
    }


    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $this->validate($request, [
            'name' => 'required',
            'email' => 'required|email|unique:users,email,'.$id,
            'password' => 'same:confirm-password',
            'roles' => 'required'
        ]);

        $input = $request->all();
        if(!empty($input['password'])){
            $input['password'] = bcrypt($input['password']);
        }else{
            $input = array_except($input,array('password'));
        }

        $user = User::find($id);
        $user->syncRoles($request->input('roles'));
        $user->update($input);

        return redirect()->route('users.home')
            ->with('success','User updated successfully');
    }


    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        User::find($id)->delete();
        return redirect()->route('users.home')
            ->with('success','User deleted successfully');
    }

}
