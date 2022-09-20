<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\News;
use App\Models\Tag;
use App\Models\User;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class NewsController extends Controller
{
    /**
     * __construct
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware(['permission:news.index|news.create|news.edit|news.delete']);
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $news = News::latest()->when(request()->q, function ($news) {
            $news = $news->where('title', 'like', '%' . request()->q . '%');
        })->paginate(10);

        return view('admin.news.index', compact('news'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $tags = Tag::latest()->get();
        $categories = Category::latest()->get();
        $users = User::latest()->get();
        return view('admin.news.create', compact('tags', 'categories', 'users'));
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
            'image'       => 'required|image|mimes:jpeg,jpg,png|max:2000',
            'title'       => 'required|unique:news',
            'category_id' => 'required',
            'user_id'     => 'required',
            'body'        => 'required',
            'tags'        => 'required',
        ]);

        //upload image
        $image = $request->file('image');
        $image->storeAs('public/news_images/', $image->hashName());

        $news = News::create([
            'image'       => $image->hashName(),
            'title'       => $request->input('title'),
            'slug'        => strtolower(Str::slug($request->input('title') . '-' . time())),
            'category_id' => $request->input('category_id'),
            'user_id'     => $request->input('user_id'),
            'body'        => $request->input('body'),
        ]);

        //assign tags
        $news->tags()->attach($request->input('tags'));
        $news->save();

        if ($news) {
            //redirect dengan pesan sukses
            return redirect()->route('admin.news.index')->with(['success' => 'Data Berhasil Disimpan!']);
        } else {
            //redirect dengan pesan error
            return redirect()->route('admin.news.index')->with(['error' => 'Data Gagal Disimpan!']);
        }
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(News $news)
    {
        $tags = Tag::latest()->get();
        $users = User::latest()->get();
        $categories = Category::latest()->get();
        return view('admin.news.edit', compact('news', 'tags', 'categories', 'users'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, News $news)
    {
        $this->validate($request, [
            'title'       => 'required|unique:news,title,' . $news->id,
            'category_id' => 'required',
            'user_id'     => 'required',
            'body'        => 'required',
        ]);

        if ($request->file('image') == "") {

            $news = News::findOrFail($news->id);
            $news->update([
                'title'       => $request->input('title'),
                'slug'        => Str::slug($request->input('title'), '-'),
                'category_id' => $request->input('category_id'),
                'user_id'     => $request->input('user_id'),
                'body'        => $request->input('body')
            ]);
        } else {

            //remove old image
            // Storage::disk('local')->delete('public/news_images/' . $news->image);
            Storage::delete('public/news_images/' . $news->image);

            //upload new image
            $image = $request->file('image');
            $image->storeAs('public/news_images/', $image->hashName());

            $news = News::findOrFail($news->id);
            $news->update([
                'image'       => $image->hashName(),
                'title'       => $request->input('title'),
                'slug'        => strtolower(Str::slug($request->input('title') . '-' . time())),
                'category_id' => $request->input('category_id'),
                'user_id'     => $request->input('user_id'),
                'body'        => $request->input('body')
            ]);
        }

        //assign tags
        $news->tags()->sync($request->input('tags'));

        if ($news) {
            //redirect dengan pesan sukses
            return redirect()->route('admin.news.index')->with(['success' => 'Data Berhasil Diupdate!']);
        } else {
            //redirect dengan pesan error
            return redirect()->route('admin.news.index')->with(['error' => 'Data Gagal Diupdate!']);
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
        $news = News::findOrFail($id);
        Storage::disk('local')->delete('public/news_images/' . $news->image);
        $news->tags()->detach();
        $news->delete();

        if ($news) {
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
