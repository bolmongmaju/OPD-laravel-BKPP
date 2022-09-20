<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Profile;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class ProfileController extends Controller
{
    /**
     * __construct
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware(['permission:profile.index|profile.create|profile.edit']);
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $profiles = Profile::latest()->when(request()->q, function ($profiles) {
            $profiles = $profiles->where('nama_opd', 'like', '%' . request()->q . '%');
        })->paginate(10);

        return view('admin.profile.index', compact('profiles'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.profile.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'nama'          => 'required',
            'short_name'    => 'required',
            'logo'          => 'required|image|mimes:jpeg,jpg,png|max:2048',
            'favicon'       => 'image|mimes:jpeg,jpg,png|max:2048',
            'struktur'      => 'image|mimes:jpeg,jpg,png|max:2048',
            'foto_pimpinan' => 'image|mimes:jpeg,jpg,png|max:2048',
            'maklumat'      => 'image|mimes:jpeg,jpg,png|max:2048',
        ]);

        if ($request->file('logo')) {
            $logo = $request->file('logo')->store('assets/profile', 'public');
        }

        if ($request->file('favicon')) {
            $favicon = $request->file('favicon')->store('assets/profile', 'public');
        }

        if ($request->file('struktur')) {
            $struktur = $request->file('struktur')->store('assets/profile', 'public');
        }

        if ($request->file('foto_pimpinan')) {
            $foto_pimpinan = $request->file('foto_pimpinan')->store('assets/profile', 'public');
        }

        if ($request->file('maklumat')) {
            $maklumat = $request->file('maklumat')->store('assets/profile', 'public');
        }

        $profile = Profile::create([
            'nama_opd'            => $request->input('nama'),
            'short_name'          => $request->input('short_name'),
            'dasar_hukum'         => $request->input('dasar_hukum'),
            'sejarah'             => $request->input('sejarah'),
            'visi'                => $request->input('visi'),
            'misi'                => $request->input('misi'),
            'program'             => $request->input('program'),
            // 'pegawai'             => $request->input('pegawai'),
            'tupoksi'             => $request->input('tupoksi'),
            'kata_sambutan'       => $request->input('kata_sambutan'),
            'logo'                => ($request->file('logo')) ? $logo : null,
            'favicon'             => ($request->file('favicon')) ? $favicon : null,
            'struktur_organisasi' => ($request->file('struktur')) ? $struktur : null,
            'foto_pimpinan'       => ($request->file('foto_pimpinan')) ? $foto_pimpinan : null,
            'maklumat'            => ($request->file('maklumat')) ? $maklumat : null,
        ]);

        if ($profile) {
            //redirect dengan pesan sukses
            return redirect()->route('admin.profile.index')->with(['success' => 'Data Berhasil Disimpan!']);
        } else {
            //redirect dengan pesan error
            return redirect()->route('admin.profile.index')->with(['error' => 'Data Gagal Disimpan!']);
        }
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Profile  $profile
     * @return \Illuminate\Http\Response
     */
    public function edit(Profile $profile)
    {
        return view('admin.profile.edit', compact('profile'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Profile  $profile
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Profile $profile)
    {
        $this->validate($request, [
            'nama'          => 'required',
            'short_name'    => 'required',
            'logo'          => 'image|mimes:jpeg,jpg,png|max:2048',
            'favicon'       => 'image|mimes:jpeg,jpg,png|max:2048',
            'struktur'      => 'image|mimes:jpeg,jpg,png|max:2048',
            'foto_pimpinan' => 'image|mimes:jpeg,jpg,png|max:2048',
            'maklumat'      => 'image|mimes:jpeg,jpg,png|max:2048',
        ]);

        if ($request->file('logo')) {
            Storage::delete($profile->logo);
            $logo = $request->file('logo')->store('assets/profile', 'public');
        }

        if ($request->file('favicon')) {
            Storage::delete($profile->favicon);
            $favicon = $request->file('favicon')->store('assets/profile', 'public');
        }

        if ($request->file('struktur')) {
            Storage::delete($profile->struktur_organisasi);
            $struktur = $request->file('struktur')->store('assets/profile', 'public');
        }

        if ($request->file('foto_pimpinan')) {
            Storage::delete($profile->foto_pimpinan);
            $foto_pimpinan = $request->file('foto_pimpinan')->store('assets/profile', 'public');
        }

        if ($request->file('maklumat')) {
            Storage::delete($profile->maklumat);
            $maklumat = $request->file('maklumat')->store('assets/profile', 'public');
        }

        $profile->findOrFail($profile->id)->update([
            'nama_opd'            => $request->input('nama'),
            'short_name'          => $request->input('short_name'),
            'dasar_hukum'         => $request->input('dasar_hukum'),
            'sejarah'             => $request->input('sejarah'),
            'visi'                => $request->input('visi'),
            'misi'                => $request->input('misi'),
            'program'             => $request->input('program'),
            // 'pegawai'             => $request->input('pegawai'),
            'tupoksi'             => $request->input('tupoksi'),
            'kata_sambutan'       => $request->input('kata_sambutan'),
            'logo'                => ($request->file('logo')) ? $logo : $profile->logo,
            'favicon'             => ($request->file('favicon')) ? $favicon : $profile->favicon,
            'struktur_organisasi' => ($request->file('struktur')) ? $struktur : $profile->struktur_organisasi,
            'foto_pimpinan'       => ($request->file('foto_pimpinan')) ? $foto_pimpinan : $profile->foto_pimpinan,
            'maklumat'            => ($request->file('maklumat')) ? $maklumat : $profile->maklumat,
        ]);

        if ($profile) {
            //redirect dengan pesan sukses
            return redirect()->route('admin.profile.index')->with(['success' => 'Data Berhasil Disimpan!']);
        } else {
            //redirect dengan pesan error
            return redirect()->route('admin.profile.index')->with(['error' => 'Data Gagal Disimpan!']);
        }
    }
}
