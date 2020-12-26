<?php

namespace App\Http\Controllers\Dashboard;

use App\Models\Permission;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;
use App\Http\Controllers\Controller;
use App\Models\Role;
use Symfony\Component\HttpFoundation\Response;

class RolesController extends Controller
{
    public function datatableRolesAPI()
    {
        // ambil semua data
        $roles = Role::orderBy('name', 'ASC')->get();

        return datatables()->of($roles)
            ->addIndexColumn()
            ->addColumn(
                'permissions',
                function ($row) {
                    $permissions = '';
                    foreach (Role::findByName($row['name'])->getAllPermissions() as $permission) {
                        $permissions .= '<span class="badge badge-pill badge-primary p-2 m-1" style="font-size: 10pt; font-weight: 400">' . $permission->name . '</span>';
                    }

                    return $permissions;
                }
            )
            ->addColumn(
                'action',
                function ($row) {
                    $btn = '';
                    if (auth()->user()->can('roles_detail')) {
                        $btn   .= '<a href="' . route('dashboard.roles.show', $row['id']) . '" class="btn btn-primary btn-sm" title="DETAIL"><i class="fa fa-eye"></i></a> ';
                    }
                    if (auth()->user()->can('roles_ubah')) {
                        $btn   .= '<a href="' . route('dashboard.roles.edit', $row['id']) . '" class="btn btn-warning btn-sm" title="UBAH"><i class="fa fa-pencil"></i></a> ';
                    }
                    if (auth()->user()->can('roles_hapus')) {
                        $btn   .= '<button type="button" id="' . $row['id'] . '" class="delete btn btn-danger btn-sm" title="HAPUS"><i class="fa fa-trash"></i></button> ';
                    }

                    return $btn ?? '';
                }
            )
            ->rawColumns(['action', 'permissions'])
            ->make(true);
    }

    public function index()
    {
        abort_if(Gate::denies('roles_lihat'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('dashboard.manajemenuser.roles.index');
    }


    public function create()
    {
        abort_if(Gate::denies('roles_tambah'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $permissions = Permission::orderBy('name')->get()->pluck('name', 'name');

        return view('dashboard.manajemenuser.roles.create', compact('permissions'));
    }


    public function store(Request $request)
    {
        abort_if(Gate::denies('roles_tambah'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $rules = [
            'name' => 'required',
            'permissions' => 'required',
        ];

        $messages = [
            'required.name' => 'Kolom peran wajib diisi!',
            'required.permissions' => 'Kolom hak akses wajib diisi!'
        ];

        $this->validate($request, $rules, $messages);

        $role = Role::create($request->except('permission'));

        if ($request->has('permissions')) {
            $role->givePermissionTo($request->input('permissions'));
        }

        return redirect()->route('dashboard.roles.index')->with(['success' => 'Peran berhasil ditambah']);
    }


    public function edit(Role $role)
    {
        abort_if(Gate::denies('roles_ubah'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $permissions = Permission::orderBy('name')->get()->pluck('name', 'name');

        return view('dashboard.manajemenuser.roles.edit', compact('role', 'permissions'));
    }


    public function update(Request $request, Role $role)
    {
        abort_if(Gate::denies('roles_ubah'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $request->validate(['name' => 'required']);

        $role->update($request->except('permission'));

        if ($request->has('permission')) {
            $role->syncPermissions($request->input('permission'));
        }

        return redirect()->route('dashboard.roles.index')->with(['success' => 'Peran berhasil diubah']);
    }


    public function show(Role $role)
    {
        abort_if(Gate::denies('roles_detail'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $role->load('permissions');

        return view('dashboard.manajemenuser.roles.show', compact('role'));
    }


    public function destroy(Role $role)
    {
        abort_if(Gate::denies('roles_hapus'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $role->delete();

        return redirect()->route('dashboard.roles.index')->with(['error' => 'Peran berhasil dihapus']);
    }
}
