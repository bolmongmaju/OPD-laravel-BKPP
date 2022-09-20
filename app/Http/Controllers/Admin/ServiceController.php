<?php

namespace App\Http\Controllers\Admin;

use App\Models\Service;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Storage;

class ServiceController extends Controller
{
    /**
     * __construct
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware(['permission:services.index|services.create|services.edit|services.delete']);
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $services = Service::latest()->when(request()->q, function ($services) {
            $services = $services->where('nama', 'like', '%' . request()->q . '%');
        })->paginate(10);

        return view('admin.service.index', compact('services'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.service.create');
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
            'nama'       => 'required',
            'keterangan' => 'required',
            'icon'       => 'image|mimes:jpeg,jpg,png|max:2000',
        ]);

        //upload icon
        if ($icon = $request->file('icon')) {
            $icon->storeAs('public/service-images', $icon->hashName());
        }

        $service = Service::create([
            'nama'    => $request->input('nama'),
            'content' => $request->input('keterangan'),
            'link'    => $request->input('link'),
            'icon'    => ($request->file('icon')) ? $icon->hashName() : null,
        ]);

        if ($service) {
            //redirect dengan pesan sukses
            return redirect()->route('admin.service.index')->with(['success' => 'Data Berhasil Disimpan!']);
        } else {
            //redirect dengan pesan error
            return redirect()->route('admin.service.index')->with(['error' => 'Data Gagal Disimpan!']);
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Service  $service
     * @return \Illuminate\Http\Response
     */
    public function show(Service $service)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Service  $service
     * @return \Illuminate\Http\Response
     */
    public function edit(Service $service)
    {
        return view('admin.service.edit', compact('service'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Service  $service
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Service $service)
    {
        $this->validate($request, [
            'nama'       => 'required',
            'keterangan' => 'required',
            'icon'       => 'image|mimes:jpeg,jpg,png|max:2000',
        ]);

        if ($request->file('icon') == "") {

            $service = Service::findOrFail($service->id);
            $service->update([
                'nama'    => $request->input('nama'),
                'content' => $request->input('keterangan'),
                'link'    => $request->input('link')
            ]);
        } else {

            //remove old image
            Storage::disk('local')->delete('public/service-images/' . $service->icon);

            //upload new image
            $icon = $request->file('icon');
            $icon->storeAs('public/service-images', $icon->hashName());

            $service = Service::findOrFail($service->id);
            $service->update([
                'icon'    => $icon->hashName(),
                'nama'    => $request->input('nama'),
                'content' => $request->input('keterangan'),
                'link'    => $request->input('link')
            ]);
        }

        if ($service) {
            //redirect dengan pesan sukses
            return redirect()->route('admin.service.index')->with(['success' => 'Data Berhasil Diupdate!']);
        } else {
            //redirect dengan pesan error
            return redirect()->route('admin.service.index')->with(['error' => 'Data Gagal Diupdate!']);
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Service  $service
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $service = Service::findOrFail($id);
        $icon = Storage::disk('local')->delete('public/service-images/' . $service->icon);
        $service->delete();

        if ($service) {
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
