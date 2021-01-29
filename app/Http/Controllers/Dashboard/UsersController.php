<?php

namespace App\Http\Controllers\Dashboard;

use App\Models\User;
use App\Models\Role;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;
use App\Http\Controllers\Controller;
use App\Rules\MustLowercase;
use App\Rules\NoDash;
use App\Rules\WithoutSpaces;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpFoundation\Response;

class UsersController extends Controller
{
    public function datatableAPI()
    {
        // ambil semua data
        $users = User::orderBy('created_at', 'ASC')->get();

        return datatables()->of($users)
            ->addIndexColumn()
            ->addColumn(
                'role',
                function ($row) {
                    return '<span class="badge badge-pill badge-primary p-2" style="font-size: 10pt; font-weight: 400">' . $row->getRoleNames()->implode('') ?? '' . '</span>';
                }
            )
            ->addColumn(
                'action',
                function ($row) {
                    $btn = '';
                    // if (auth()->user()->can('users_detail')) {
                    //     $btn   .= '<a href="' . route('dashboard.users.show', $row['id']) . '" class="btn btn-primary btn-sm" data-toggle="tooltip" data-placement="top" title="DETAIL"><i class="fa fa-eye"></i></a> ';
                    // }
                    if (auth()->user()->can('users_ubah')) {
                        $btn   .= '<a href="' . route('dashboard.users.edit', $row['id']) . '" class="btn btn-warning btn-sm" data-toggle="tooltip" data-placement="top" title="UBAH"><i class="fa fa-pencil"></i></a> ';
                    }

                    // user tidak dapat menghapus akunnya sendiri
                    if ($row['id'] != Auth::user()->id) {
                        if (auth()->user()->can('users_hapus')) {
                            $btn   .= '<button type="button" id="' . $row['id'] . '" class="delete btn btn-danger btn-sm" data-toggle="tooltip" data-placement="top" title="HAPUS"><i class="fa fa-trash"></i></button> ';
                        }
                    }

                    if (!empty($btn)) {
                        $divGroupPrefix = '<div class="btn-group" role="group" aria-label="Aksi Group Button">';
                        $divGroupSuffix = '</div';
                        $btn = $divGroupPrefix . $btn . $divGroupSuffix;

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

        return view('dashboard.manajemenuser.users.index');
    }


    public function create()
    {
        abort_if(Gate::denies('users_tambah'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $roles = Role::get();

        return view('dashboard.manajemenuser.users.create', compact('roles'));
    }


    public function store(Request $request)
    {
        abort_if(Gate::denies('users_tambah'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $rules = [
            'name'      => 'required',
            'username'  => ['required', 'min:3', 'unique:users,username', new WithoutSpaces('Kolom Username tidak boleh ada spasi!'), new NoDash('Kolom Username tidak boleh menggunakan tanda pisah (-)!'), new MustLowercase('Kolom Username harus menggunakan huruf kecil!')],
            'email'     => 'required|email|unique:users,email',
            'password'  => 'required|confirmed|min:6',
            'role'      => 'required',
        ];

        $messages = [
            'name.required'             => 'Kolom Nama wajib diisi!',
            'username.required'         => 'Kolom Username wajib diisi!',
            'username.min'              => 'Kolom Username minimal 3 karakter!',
            'username.unique'           => 'Username sudah dipakai, silakan pilih username lain!',
            'email.required'            => 'Kolom Email wajib diisi!',
            'email.email'               => 'Format Email tidak sesuai!',
            'email.unique'              => 'Email sudah terdaftar, silakan pilih email yang lain!',
            'password.required'         => 'Kolom Password wajib diisi!',
            'password.confirmed'        => 'Kolom Password tidak sama dengan Konfirmasi Password!',
            'password.min'              => 'Kolom Password minimal 6 karakter!',
            'role.required'             => 'Wajib pilih peran!',
        ];

        $this->validate($request, $rules, $messages);

        $user = User::create($request->all());

        if ($request->has('role')) {
            $user->assignRole($request->input('role'));
        }

        return redirect()->route('dashboard.users.index')->with(['success' => 'Pengguna berhasil ditambah']);
    }


    public function edit(User $user)
    {
        abort_if(Gate::denies('users_ubah'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $roles = Role::get();

        return view('dashboard.manajemenuser.users.edit', compact('user', 'roles'));
    }


    public function update(Request $request, User $user)
    {
        abort_if(Gate::denies('users_ubah'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $rules = [
            'name'      => 'required',
            'username'  => ['required', 'min:3', 'unique:users,username', new WithoutSpaces('Kolom Username tidak boleh ada spasi!'), new NoDash('Kolom Username tidak boleh menggunakan tanda pisah (-)!'), new MustLowercase('Kolom Username harus menggunakan huruf kecil!')],
            'email'     => 'required|email|unique:users,email,' .$user->id,
            'role'      => 'sometimes|required',
        ];

        $messages = [
            'name.required'             => 'Kolom Nama wajib diisi!',
            'username.required'         => 'Kolom Username wajib diisi!',
            'username.min'              => 'Kolom Username minimal 3 karakter!',
            'username.unique'           => 'Username sudah dipakai, silakan pilih username lain!',
            'email.required'            => 'Kolom Email wajib diisi!',
            'email.email'               => 'Format Email tidak sesuai!',
            'email.unique'              => 'Email sudah terdaftar, silakan pilih email yang lain!',
            'role.required'             => 'Wajib pilih peran!',
        ];

        $this->validate($request, $rules, $messages);

        $user->update($request->all());

        if ($request->has('roles')) {
            $user->assignRole($request->input('roles'));
        }

        return redirect()->route('dashboard.users.index')->with(['success' => 'Pengguna berhasil diubah']);
    }

    public function show(User $user)
    {
        abort_if(Gate::denies('users_detail'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $user->load('roles');

        return view('dashboard.manajemenuser.users.show', compact('user'));
    }


    public function destroy(User $user)
    {
        abort_if(Gate::denies('users_hapus'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        if ($user->delete()) {
            return response()->json(['status' => 'success', 'message' => 'Pengguna berhasil dihapus']);
        } else {
            return response()->json(['status' => 'error', 'message' => 'Pengguna gagal dihapus']);
        }
    }
}
