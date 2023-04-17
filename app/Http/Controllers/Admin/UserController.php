<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreUpdateUser;
use Illuminate\Http\Request;
use App\Models\User;

class UserController extends Controller
{
    protected $repository;

    public function __construct(User $user)
    {
        $this->repository = $user;
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {   // $users = $this->repository->paginate(); //tinha todos os users
        $users = $this->repository->TenantUser()->latest()->paginate(); //agora tem os users de acordo com o scope | onde o tenant for igual ao do user autenticado

        return view('admin.pages.users.index', compact('users'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.pages.users.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  App\Http\Requests\StoreUpdateUser $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreUpdateUser $request)
    {
        //auth()->user()->tenant_id; ou
        $tenant = auth()->user()->tenant;

        $data = $request->all();
        $data['tenant_id'] = $tenant->id;
        $data['password'] = bcrypt('password'); //encrypt password

        $this->repository->create($data); //precisa do tenant para cadastrar usuário, por isso essas maruagem aí em cima

        return redirect()->route('users.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //lembre-se que antes era $this->repository->find($id) | so que agora estamos "filtrando"
        //pelos usuários com o mesmo tenant do usuario autenticado, usando essa consulta através do SCOPE
        if (!$user = $this->repository->tenantUser()->find($id)) {
            return redirect()->back();
        }
        return view('admin.pages.users.show', compact('user'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        if (!$user = $this->repository->tenantUser()->find($id)) {
            return redirect()->back();
        }
        return view('admin.pages.users.edit', compact('user'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  App\Http\Requests\StoreUpdateUser $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(StoreUpdateUser $request, $id)
    {
        if (!$user = $this->repository->tenantUser()->find($id)) {
            return redirect()->back();
        }

        $data = $request->only('name', 'email');

        if ($request->password) { //se o usuario passar a senha no form
            $data['password'] = bcrypt($request->password);
        }

        $user->update($data);

        return redirect()->route('users.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        if (!$user = $this->repository->tenantUser()->find($id)) {
            return redirect()->back();
        }

        $user->delete();

        return redirect()->route('users.index');
    }

    /**
     * Search Resultados
     *
     * @param  Request $request
     * @return \Illuminate\Http\Response
     */

    public function search(Request $request){

        $filters = $request->only('filter');
        $user = $this->repository->where(function($query) use ($request){
            if($request->filter){
                $query->where('name', 'LIKE', "%{$request->filter}%")
                      ->orWhere('email', 'LIKE', $request->filter);
            }
        })
        ->tenantUser() //aplicando o scopo ate no filtro, porém será feito automatico em outro controller
        ->paginate(5);

        return view('admin.pages.users.index', [
            'users' => $user,
            'filters' => $filters,
        ]);
    }
}
