<?php

namespace App\Http\Controllers\Admin\ACL;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreUpdateProfile;
use App\Models\Profile;
use Illuminate\Http\Request;

class ProfileController extends Controller
{
    protected $repository;

    public function __construct(Profile $profile)
    {
        $this->repository = $profile;
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $profiles = $this->repository->latest()->paginate();

        return view('admin.pages.profiles.index', compact('profiles'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.pages.profiles.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  App\Http\Requests\StoreUpdateProfile $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreUpdateProfile $request)
    {
        $this->repository->create($request->all());

        return redirect()->route('perfil.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        if (!$profile = $this->repository->find($id)) {
            return redirect()->back();
        }
        return view('admin.pages.profiles.show', compact('profile'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        if (!$profile = $this->repository->find($id)) {
            return redirect()->back();
        }
        return view('admin.pages.profiles.edit', compact('profile'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  App\Http\Requests\StoreUpdateProfile $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(StoreUpdateProfile $request, $id)
    {
        if (!$profile = $this->repository->find($id)) {
            return redirect()->back();
        }

        $profile->update($request->all());

        return redirect()->route('perfil.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        if (!$profile = $this->repository->find($id)) {
            return redirect()->back();
        }

        $profile->delete();

        return redirect()->route('perfil.index');
    }

    /**
     * Search Resultados
     *
     * @param  Request $request
     * @return \Illuminate\Http\Response
     */

    public function search(Request $request){

        $filters = $request->only('filter');
        $profile = $this->repository->where(function($query) use ($request){
            if($request->filter){
                $query->where('name', 'LIKE', "%{$request->filter}%")
                      ->orWhere('description', 'LIKE', "%{$request->filter}%");
            }
        })->paginate(5);

        return view('admin.pages.profiles.index', [
            'profiles' => $profile,
            'filters' => $filters,
        ]);
    }
}
