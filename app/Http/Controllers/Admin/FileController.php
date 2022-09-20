<?php

namespace App\Http\Controllers\Admin;

use App\Models\File;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Storage;


class FileController extends Controller
{
    /**
     * __construct
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware(['permission:files.index|files.create|files.edit|files.delete']);
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $files = File::latest()->when(request()->q, function ($files) {
            $files = $files->where('title', 'like', '%' . request()->q . '%');
        })->paginate(10);

        return view('admin.file.index', compact('files'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.file.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|unique:files,title',
            'data'  => 'required|file|mimes:pdf,docx,xlsx,doc,zip|max:200048',
        ]);

        $input = $request->all();

        if ($file = $request->file('data')) {
            $destinationPath = 'public/download-files';
            $profileFile = date('YmdHis') . "." . $file->getClientOriginalExtension();
            $file->move($destinationPath, $profileFile);
            $input['data'] = "$profileFile";
        }

        File::create($input);

        if ($input) {
            //redirect dengan pesan sukses
            return redirect()->route('admin.file.index')->with(['success' => 'Data Berhasil Disimpan!']);
        } else {
            //redirect dengan pesan error
            return redirect()->route('admin.file.index')->with(['error' => 'Data Gagal Disimpan!']);
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Download  $download
     * @return \Illuminate\Http\Response
     */
    public function show(File $file)
    {
        return view('admin.file.show', compact('file'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Download  $download
     * @return \Illuminate\Http\Response
     */
    public function edit(File $file)
    {
        return view('admin.file.edit', compact('file'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Download  $download
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, File $file)
    {
        $this->validate($request, [
            'title' => 'required|unique:files,title,' . $file->id,
            'data'  => 'file|mimes:pdf,docx,xlsx,doc,zip|max:200048',
        ]);

        if ($request->file('data') == "") {

            $file = File::findOrFail($file->id);
            $file->update([
                'title' => $request->input('title'),
                'body'  => $request->input('body')
            ]);
        } else {

            //remove old image
            Storage::disk('local')->delete('public/download-files/' . $file->data);

            //upload new image
            $data = $request->file('data');
            $data->storeAs('public/download-files/', $data->hashName());

            $file = File::findOrFail($file->id);
            $file->update([
                'data'  => $data->hashName(),
                'title' => $request->input('title'),
                'body'  => $request->input('body')
            ]);
        }

        if ($file) {
            //redirect dengan pesan sukses
            return redirect()->route('admin.file.index')->with(['success' => 'Data Berhasil Diupdate!']);
        } else {
            //redirect dengan pesan error
            return redirect()->route('admin.file.index')->with(['error' => 'Data Gagal Diupdate!']);
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Download  $download
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $download = File::findOrFail($id);
        unlink('public/download-files/' . $download->data);
        $file = Storage::disk('local')->delete('public/download-files/' . $download->data);
        $download->delete();

        if ($download) {
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
