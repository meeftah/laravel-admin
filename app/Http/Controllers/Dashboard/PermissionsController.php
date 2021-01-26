<?php

namespace App\Http\Controllers\Dashboard;

use App\Models\Permission;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;
use App\Http\Controllers\Controller;
use App\Models\Role;
use Symfony\Component\HttpFoundation\Response;

class PermissionsController extends Controller
{
    public function datatablePermissionsAPI()
    {
        // ambil semua data
        $permissions = Permission::orderBy('name', 'ASC')->get();

        return datatables()->of($permissions)
            ->addIndexColumn()
            ->addColumn(
                'action',
                function ($row) {
                    $btn = '';
                    if (auth()->user()->can('permissions_ubah')) {
                        $btn   .= '<a href="' . route('dashboard.permissions.edit', $row['id']) . '" class="btn btn-warning btn-sm" data-toggle="tooltip" data-placement="top" title="UBAH"><i class="fa fa-pencil"></i></a> ';
                    }
                    if (auth()->user()->can('permissions_hapus')) {
                        $btn   .= '<button type="button" id="' . $row['id'] . '" class="delete btn btn-danger btn-sm" data-toggle="tooltip" data-placement="top" title="HAPUS"><i class="fa fa-trash"></i></button> ';
                    }

                    if (!empty($btn)) {
                        $divGroupPrefix = '<div class="btn-group" role="group" aria-label="Aksi Group Button">';
                        $divGroupSuffix = '</div';
                        $btn = $divGroupPrefix . $btn . $divGroupSuffix;

                    }

                    return $btn ?? '';
                }
            )
            ->rawColumns(['action'])
            ->make(true);
    }

    public function index()
    {
        abort_if(Gate::denies('permissions_lihat'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('dashboard.manajemenuser.permissions.index');
    }


    public function store(Request $request)
    {
        abort_if(Gate::denies('permissions_tambah'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $rules = [
            'akses'     => 'required',
            'opsi'      => 'required'
        ];

        $messages = [
            'required' => 'Kolom :attribute wajib diisi!'
        ];

        $this->validate($request, $rules, $messages);

        foreach ($request->opsi as $option) {
            $name = $request->akses . '_' . $option;
            $permissions = new Permission();
            $permissions->name = $name;
            $permissions->save();

            // give all new created permission to superadmin
            $role = Role::where('name', 'superadmin')->first();
            $role->givePermissionTo($name);
        }

        return back()->with(['success' => 'Hak akses berhasil ditambah']);
    }


    public function edit(Permission $permission)
    {
        abort_if(Gate::denies('permissions_ubah'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('dashboard.manajemenuser.permissions.edit', compact('permission'));
    }


    public function update(Request $request, Permission $permission)
    {
        abort_if(Gate::denies('permissions_ubah'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $request->validate(['name' => 'required']);

        $permission->update($request->all());

        return redirect()->route('dashboard.permissions.index')->with(['success' => 'Hak Akses berhasil diubah']);
    }

    public function destroy(Permission $permission)
    {
        abort_if(Gate::denies('permissions_hapus'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        if ($permission->delete()) {
            return response()->json(['status' => 'success', 'message' => 'Hak Akses berhasil dihapus']);
        } else {
            return response()->json(['status' => 'error', 'message' => 'Hak Akses gagal dihapus']);
        }
    }

}
