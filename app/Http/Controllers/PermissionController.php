<?php

namespace App\Http\Controllers;

use App\Models\logo;
use App\Models\permission;
use App\Models\role;
use App\Models\role_permission;
use Illuminate\Http\Request;

class PermissionController extends Controller
{
    public function create()
    {
        $logo = logo::first();
        $roles = role::all();
        $permissions = permission::all();
        return view('admin.rolePermission.create', ['logo' => $logo, 'roles' => $roles, 'permissions' => $permissions]);
    }
    public function roleStore(Request $request)
    {
        $request->validate(
            [
                'name' => ['required'],
            ],
            [
                'name.required' => 'عنوان نقش را وارد کنید.',
            ]
        );
        role::create($request->all());
        return redirect()->back()->with('success', 'نقش جدید ایجاد شد.');
    }
    public function roleDelete(role $role)
    {
        if ($role->name != 'مالک') {
            role_permission::where('role_id', $role->id)->delete();
            $role->delete();
            return redirect()->back()->with('failure', ' نقش ' . $role['name'] . ' حذف شد. ');
        }
        return redirect()->back();
    }
    public function setPermissions(Request $request)
    {
        if (isset($request['data'])) {
            if (isset($request['data']['roles']) && isset($request['data']['permissions'])) {
                foreach ($request['data']['roles'] as $role) {
                    role_permission::where('role_id', $role)->delete();
                }
                foreach ($request['data']['roles'] as $role) {
                    foreach ($request['data']['permissions'] as $permission) {
                        role_permission::create([
                            'role_id' => $role,
                            'permission_id' => $permission
                        ]);
                    }
                }
                return response()->json(true);
            } else {
                return response()->json(false);
            }
        } else {
            return response()->json(false);
        }
    }
}
