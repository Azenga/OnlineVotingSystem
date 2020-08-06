<?php

namespace App\Http\Controllers\Admin;

use App\Role;
use App\Permission;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class RolesPermissionsController extends Controller
{
    public function destroy(Role $role, Permission $permission)
    {
        $role->permissions()->detach($permission);

        return redirect()->route('admin.roles.show', $role);
    }
}
