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

    public function profiles($idPermission)
    {
        if (!$permission = $this->permission->find($idPermission)) {
            return redirect()->back();
        }

        $profiles = $permission->profiles()->paginate();

        return view('admin.pages.permissions.profiles.profiles', compact('permission', 'profiles'));
    }



    public function permissionAvailable(Request $request, $idprofile){
        if(!$profile = $this->profile->find($idprofile)){
            return redirect()->back();
        }

        $filters = $request->except('_token');

        $permissions = $profile->permissionsAvailable($request->filter);

        return view('admin.pages.profiles.permissions.available', compact('profile', 'permissions', 'filters'));
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

        return redirect()->route('perfil.permission', $profile->id);
        
    }

    public function desvincularPermissionProfile($idProfile, $idPermission){
        $profile = $this->profile->find($idProfile);
        $permission = $this->permission->find($idPermission);

        if (!$profile || !$permission) {
            return redirect()->back();
        }

        $profile->permission()->detach($permission);

        return redirect()->route('perfil.permission', $profile->id);
    }
}
