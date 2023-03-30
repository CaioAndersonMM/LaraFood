<?php

namespace App\Http\Controllers\Admin\ACL;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Profile;
use App\Models\Permission;

class PermissionProfileController extends Controller
{
    protected $profile, $permission;

    public function __construct(Profile $profile, Permission $permission)
    {
        $this->profile = $profile;
        $this->permission = $permission;
    }
    public function permission($idprofile){
        if(!$profile = $this->profile->find($idprofile)){
            return redirect()->back();
        }

        $permissions = $profile->permission()->paginate();

        return view('admin.pages.profiles.permissions.permissions', compact('profile', 'permissions'));
    }

    public function permissionAvailable($idprofile){
        if(!$profile = $this->profile->find($idprofile)){
            return redirect()->back();
        }

        $permissions = $this->permission->paginate();

        return view('admin.pages.profiles.permissions.available', compact('profile', 'permissions'));
    }

    public function vincularPermissionProfile(Request $request, $idprofile){
        if(!$profile = $this->profile->find($idprofile)){
            return redirect()->back();
        }

        //validação 
        if(!$request->permission || count($request->permission) == 0){
            return redirect()
                ->back()
                ->with('message', 'Você deve escolher pelos menos uma permissão!');
        }

        $profile->permission()->attach($request->permission);

        return redirect()->route('perfil.permission');
        
    }
}
