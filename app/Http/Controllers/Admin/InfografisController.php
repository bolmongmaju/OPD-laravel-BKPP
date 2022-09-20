<?php

namespace App\Http\Controllers\Admin;

use App\Models\Infografis;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Storage;

class InfografisController extends Controller
{
    /**
     * __construct
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware(['permission:infografis.index|infografis.create|infografis.delete']);
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $infografis = Infografis::latest()->when(request()->q, function ($infografis) {
            $infografis = $infografis->where('title', 'like', '%' . request()->q . '%');
        })->paginate(10);

        return view('admin.infografis.index', compact('infografis'));
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
            'image' => 'required|image|mimes:jpeg,jpg,png|max:2048',
        ]);

        //upload image
        $image = $request->file('image');
        $image->storeAs('public/infografis', $image->hashName());

        $infografis = Infografis::create([
            'image' => $image->hashName(),
            'title' => $request->input('title')
        ]);

        if ($infografis) {
            //redirect dengan pesan sukses
            return redirect()->route('admin.infografis.index')->with(['success' => 'Data Berhasil Disimpan!']);
        } else {
            //redirect dengan pesan error
            return redirect()->route('admin.infografis.index')->with(['error' => 'Data Gagal Disimpan!']);
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $infografis = Infografis::findOrFail($id);
        $image = Storage::disk('local')->delete('public/infografis/' . $infografis->image);
        $infografis->delete();

        if ($infografis) {
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
