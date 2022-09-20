<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Contact;
use Illuminate\Http\Request;

class ContactController extends Controller
{
    /**
     * __construct
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware(['permission:contact.index|contact.create|contact.edit|contact.delete']);
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $contacts = Contact::latest()->get();
        return view('admin.contact.index', compact('contacts'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.contact.create');
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
            'email'   => 'required|unique:contacts,email',
            'no_telp' => 'required|unique:contacts,no_telp',
            'alamat'  => 'required',
        ]);

        $contact = Contact::create([
            'email'      => $request->input('email'),
            'alamat'     => $request->input('alamat'),
            'no_telp'    => $request->input('no_telp'),
            'maps'       => $request->input('maps'),
            'hari_kerja' => $request->input('hari'),
            'jam_buka'   => $request->input('jam_buka'),
            'jam_tutup'  => $request->input('jam_tutup'),
        ]);

        if ($contact) {
            //redirect dengan pesan sukses
            return redirect()->route('admin.contact.index')->with(['success' => 'Data Berhasil Disimpan!']);
        } else {
            //redirect dengan pesan error
            return redirect()->route('admin.contact.index')->with(['error' => 'Data Gagal Disimpan!']);
        }
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Contact  $contact
     * @return \Illuminate\Http\Response
     */
    public function edit(Contact $contact)
    {
        $contacts = [
            'Setiap Hari', 'Senin-Jumat', 'Senin-Sabtu', 'Senin-Minggu'
        ];
        return view('admin.contact.edit', compact('contact', 'contacts'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Contact  $contact
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Contact $contact)
    {
        $this->validate($request, [
            'email'   => 'required',
            'no_telp' => 'required',
            'alamat'  => 'required',
        ]);

        $contact = Contact::findOrFail($contact->id)->update([
            'email'      => $request->input('email'),
            'alamat'     => $request->input('alamat'),
            'no_telp'    => $request->input('no_telp'),
            'maps'       => $request->input('maps'),
            'hari_kerja' => $request->input('hari'),
            'jam_buka'   => $request->input('jam_buka'),
            'jam_tutup'  => $request->input('jam_tutup'),
        ]);

        if ($contact) {
            //redirect dengan pesan sukses
            return redirect()->route('admin.contact.index')->with(['success' => 'Data Berhasil Disimpan!']);
        } else {
            //redirect dengan pesan error
            return redirect()->route('admin.contact.index')->with(['error' => 'Data Gagal Disimpan!']);
        }
    }
}
