<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Requests\Admin\StoreUsersRequest;
use App\Http\Requests\Admin\UpdateUsersRequest;
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
    public function datatableUsersAPI()
    {
        // ambil semua data
        // jika user mempunyai peran superadmin maka dapat melihat semua data pengguna
        // namun jika bukan, namun mempunyai akses manajemen user maka tidak menampilkan
        // pengguna yang mempunyai peran calon siswa
        if (Auth::user()->hasRole('superadmin')) {
            $users = User::orderBy('created_at', 'ASC')->get();
        } else {
            $users = User::whereHas('roles', function ($q) {
                $rolesNot = [config('ppdb.peran.casis.tk'), config('ppdb.peran.casis.sd'), config('ppdb.peran.casis.smp'), config('ppdb.peran.casis.sma')];
                $q->whereNotIn('name', $rolesNot);
            })->orderBy('created_at', 'ASC')->get();
        }

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
                    if (auth()->user()->can('users_detail')) {
                        $btn   .= '<a href="' . route('dashboard.users.show', $row['id']) . '" class="btn btn-primary btn-sm" title="DETAIL"><i class="fa fa-eye"></i></a> ';
                    }
                    if (auth()->user()->can('users_ubah')) {
                        $btn   .= '<a href="' . route('dashboard.users.edit', $row['id']) . '" class="btn btn-warning btn-sm" title="UBAH"><i class="fa fa-pencil"></i></a> ';
                    }

                    // user tidak dapat menghapus akunnya sendiri
                    if ($row['id'] != Auth::user()->id) {
                        if (auth()->user()->can('users_hapus')) {
                            $btn   .= '<button type="button" id="' . $row['id'] . '" class="delete btn btn-danger btn-sm" title="HAPUS"><i class="fa fa-trash"></i></button> ';
                        }
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

        // // set TK
        // $ids = ['cba2cfce-f2bc-437c-acab-0d75b5a55460', '7ef0f85f-fb40-4cac-83e7-a77c7610a877'];
        // $users = User::whereIn('id', $ids)->get();
        // foreach ($users as $user) {
        //     $user->assignRole(config('ppdb.peran.casis.tk'));
        // }

        // // set SD
        // $ids = [
        //     '46037887-0711-44de-a800-2271bd669b2f', '3b0c36e8-a9c1-42b3-a22b-10374b3f5181', '0e7aca1d-80d8-4485-8660-2c71684ad046', '21f889b1-cab7-4d74-b828-8b6baee5ae09'
        // ];
        // $users = User::whereIn('id', $ids)->get();
        // foreach ($users as $user) {
        //     $user->assignRole('Calon Siswa SD');
        // }

        // // set SMP
        // $ids = [
        //     'ae814a65-5ea4-4924-9a67-aa9c3bfcf36f', '10f45383-7648-4245-a1ad-1a06bcacfda6', '57307a82-6692-4b9f-a06c-761683b0c4ce', 'b243a6e4-a870-453e-9086-d793bc8ac82e', 
        //     'a3593230-ae01-4206-bdfc-6699c277f484', '1972026c-9a3a-4a0a-b427-dff6bd87f1ae', '2d57275a-6760-42b5-9bd3-9da645ea4457', 'ff24f038-a52a-4b5c-87af-987d0c43ec62',
        //     'def5d4b2-9a45-4f64-9a00-cb625017e9d3', 'f45315d5-1bc3-4a2e-a55d-224c7223a837', '8ac0fd84-e545-4901-8f01-b5d3bf7b138e', '47b53c35-5650-4f3a-b493-7322b755cf1b',
        //     '62f7973e-4016-40f9-8f9c-e94274248d34', '95414b32-16fc-40e4-8c9f-e14161500cd9', '6a1309d5-418f-455b-a7c4-5e647bfb0d0a', '9a2e8942-3de5-49d3-82ce-8e8830ebee64',
        //     'a18b1bf7-b0ed-49a5-89e8-d69751589dde', '678e4706-092c-47b4-99a0-f7d00a108150', '1f294ac9-8810-4210-aa9b-110a35b15a18', 'bbd24d5e-0767-47c9-aff5-a4ae2ebe2ee6'
        // ];
        // $users = User::whereIn('id', $ids)->get();
        // foreach ($users as $user) {
        //     $user->assignRole('Calon Siswa SMP');
        // }

        // // set SMA
        // $ids = [
        //     'cd6c9666-fd4e-4829-9ad3-9bf867520575', 'a6bb4013-8aba-4d3f-b3ec-ce266346fb64', '76330a94-98e5-42b2-9ed9-34c13b9eaa1a', '89b2d0a7-03b4-4842-ab93-4ac760b7bbf2',
        //     'd3e3c9fe-4496-43c2-a449-b4bc10e9bfbf', '15022bac-dde4-4685-90a9-aa364be75c77', 'ca1fa472-e9ed-490c-985a-31d939a2385a', 'ce2b6f5f-4f30-47b8-9f8c-78389a61ccd3',
        //     'de319b16-0947-4b62-ada1-d55600e2d120', '7738dcc5-bf5f-4c2b-bc26-a8f2f54c3b60'
        // ];
        // $users = User::whereIn('id', $ids)->get();
        // foreach ($users as $user) {
        //     $user->assignRole('Calon Siswa SMA');
        // }

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
            'username'  => ['required', 'min:3', 'unique:users,username', new WithoutSpaces('Kolom Username tidak boleh ada spasi!'), new NoDash('Kolom Username tidak boleh menggunakan tanda pisah (-)!'), new MustLowercase('Kolom Username harus menggunakan huruf kecil!')],
            'email'     => 'required|email|unique:users,email',
            'nohp'      => 'required|min:11|max:13|unique:users,nohp',
            'password'  => 'required|confirmed|min:6',
            'role'      => 'required',
            // 'id_status_pendaftaran' => 'required',
        ];

        $messages = [
            'username.required'         => 'Kolom Username wajib diisi!',
            'username.min'              => 'Kolom Username minimal 3 karakter!',
            'username.unique'           => 'Username sudah dipakai, silakan pilih username lain!',
            'email.required'            => 'Kolom Email wajib diisi!',
            'email.email'               => 'Format Email tidak sesuai!',
            'email.unique'              => 'Email sudah terdaftar, silakan pilih email yang lain!',
            'nohp.required'             => 'No Whatsapp wajib diisi!',
            'nohp.min'                  => 'No Whatsapp minimal 11 digit!',
            'nohp.max'                  => 'No Whatsapp maksimal 13 digit!',
            'nohp.unique'               => 'No Whatsapp sudah terdaftar, silakan pilih nomor yang lain!',
            'password.required'         => 'Kolom Password wajib diisi!',
            'password.confirmed'        => 'Kolom Password tidak sama dengan Konfirmasi Password!',
            'password.min'              => 'Kolom Password minimal 6 karakter!',
            'role.required'             => 'Wajib pilih peran!',
            // 'id_status_pendaftaran.required' => 'Wajib pilih pendaftaran!',
        ];

        $this->validate($request, $rules, $messages);

        $user = User::create($request->all());

        if ($request->has('role')) {
            $user->assignRole($request->input('role'));
        }

        return redirect()->route('dashboard.users.index')->with(['success' => 'User created']);
    }


    public function edit(User $user)
    {
        abort_if(Gate::denies('users_ubah'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $roles = Role::get()->pluck('name', 'name');

        return view('dashboard.manajemenuser.users.edit', compact('user', 'roles'));
    }


    public function update(UpdateUsersRequest $request, User $user)
    {
        abort_if(Gate::denies('users_ubah'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $user->update($request->all());

        if ($request->has('roles')) {
            $user->assignRole($request->input('roles'));
        }

        return redirect()->route('dashboard.users.index')->with(['success' => 'User Updated']);
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

        $user->delete();

        return redirect()->route('dashboard.users.index')->with(['error' => 'User Deleted']);
    }
}
