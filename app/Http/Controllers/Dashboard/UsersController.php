<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Requests\Admin\StoreUsersRequest;
use App\Http\Requests\Admin\UpdateUsersRequest;
use App\Models\User;
use App\Models\Role;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;
use App\Http\Controllers\Controller;
use Symfony\Component\HttpFoundation\Response;

class UsersController extends Controller
{
    public function datatableUsersAPI()
    {
        // ambil semua data
        $users = User::orderBy('name', 'ASC')->get();

        return datatables()->of($users)
            ->addIndexColumn()
            ->addColumn(
                'role',
                function ($row) {
                    return '<span class="badge badge-pill badge-primary p-2" style="font-size: 10pt; font-weight: 400">' . Role::findByName($row['name'])->name ?? '' . '</span>';
                }
            )
            ->addColumn(
                'action',
                function ($row) {
                    $btn = '';
                    if (auth()->user()->can('users_detail')) {
                        $btn   .= '<a href="' . route('dashboard.users.show', $row['id']) . '" class="btn btn-primary btn-sm" title="DETAIL"><i class="fa fa-eye"></i></a> ';
                    }
                    if (auth()->user()->can('users_ubah')) {
                        $btn   .= '<a href="' . route('dashboard.users.edit', $row['id']) . '" class="btn btn-warning btn-sm" title="UBAH"><i class="fa fa-pencil"></i></a> ';
                    }
                    if (auth()->user()->can('users_hapus')) {
                        $btn   .= '<button type="button" id="' . $row['id'] . '" class="delete btn btn-danger btn-sm" title="HAPUS"><i class="fa fa-trash"></i></button> ';
                    }

                    return $btn ?? '';
                }
            )
            ->rawColumns(['action', 'role'])
            ->make(true);
    }

    public function index()
    {
        abort_if(Gate::denies('users_lihat'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('dashboard.users.index');
    }


    public function create()
    {
        abort_if(Gate::denies('users_tambah'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $roles = Role::get();

        return view('dashboard.users.create', compact('roles'));
    }


    public function store(StoreUsersRequest $request)
    {
        abort_if(Gate::denies('users_tambah'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $user = User::create($request->all());

        if($request->has('roles')) {
            $user->assignRole($request->input('roles'));
        }

        return redirect()->route('dashboard.users.index')->with(['success' => 'User created']);
    }


    public function edit(User $user)
    {
        abort_if(Gate::denies('users_ubah'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $roles = Role::get()->pluck('name', 'name');

        return view('dashboard.users.edit', compact('user', 'roles'));
    }


    public function update(UpdateUsersRequest $request, User $user)
    {
        abort_if(Gate::denies('users_ubah'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $user->update($request->all());

        if($request->has('roles')) {
            $user->assignRole($request->input('roles'));
        }

        return redirect()->route('dashboard.users.index')->with(['success' => 'User Updated']);
    }

    public function show(User $user)
    {
        abort_if(Gate::denies('users_detail'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $user->load('roles');

        return view('dashboard.users.show', compact('user'));
    }


    public function destroy(User $user)
    {
        abort_if(Gate::denies('users_hapus'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $user->delete();

        return redirect()->route('dashboard.users.index')->with(['error' => 'User Deleted']);
    }


}
