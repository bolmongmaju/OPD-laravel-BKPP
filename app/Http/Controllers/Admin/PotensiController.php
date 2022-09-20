<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Potensi;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

class PotensiController extends Controller
{
    /**
     * __construct
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware(['permission:potensi.index|potensi.create|potensi.edit|potensi.delete']);
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $potensis = Potensi::latest()->when(request()->q, function ($potensis) {
            $potensis = $potensis->where('title', 'like', '%' . request()->q . '%');
        })->paginate(10);

        return view('admin.potensi.index', compact('potensis'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.potensi.create');
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
            'title' => 'required|unique:potensis,title',
            'body'  => 'required',
            'image' => 'image|mimes:jpeg,jpg,png|max:2048',
        ]);

        if ($request->file('image')) {
            $image = $request->file('image')->store('assets/potensi', 'public');
        }

        $potensi = Potensi::create([
            'title' => $request->input('title'),
            'slug'  => strtolower(Str::slug($request->input('title') . '-' . time())),
            'body'  => $request->input('body'),
            'image' => ($request->file('image')) ? $image : null,
        ]);

        if ($potensi) {
            //redirect dengan pesan sukses
            return redirect()->route('admin.potensi.index')->with(['success' => 'Data Berhasil Disimpan!']);
        } else {
            //redirect dengan pesan error
            return redirect()->route('admin.potensi.index')->with(['error' => 'Data Gagal Disimpan!']);
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Potensi  $potensi
     * @return \Illuminate\Http\Response
     */
    public function show(Potensi $potensi)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Potensi  $potensi
     * @return \Illuminate\Http\Response
     */
    public function edit(Potensi $potensi)
    {
        return view('admin.potensi.edit', compact('potensi'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Potensi  $potensi
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Potensi $potensi)
    {
        $this->validate($request, [
            'title' => 'required',
            'body'  => 'required',
            'image' => 'image|mimes:jpeg,jpg,png|max:2048',
        ]);

        if ($request->file('image')) {
            $image = $request->file('image')->store('assets/potensi', 'public');
        }

        $potensi = Potensi::findOrFail($potensi->id)->update([
            'title' => $request->input('title'),
            'slug'  => strtolower(Str::slug($request->input('title') . '-' . time())),
            'body'  => $request->input('body'),
            'image' => ($request->file('image')) ? $image : $potensi->image,
        ]);

        if ($potensi) {
            //redirect dengan pesan sukses
            return redirect()->route('admin.potensi.index')->with(['success' => 'Data Berhasil Disimpan!']);
        } else {
            //redirect dengan pesan error
            return redirect()->route('admin.potensi.index')->with(['error' => 'Data Gagal Disimpan!']);
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Potensi  $potensi
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $potensi = Potensi::findOrFail($id);
        Storage::delete($potensi->image);
        $potensi->delete();

        if ($potensi) {
            return response()->json([
                'status' => 'success'
            ]);
        } else {
            return response()->json([
                'status' => 'error'
            ]);
        }
    }
}
