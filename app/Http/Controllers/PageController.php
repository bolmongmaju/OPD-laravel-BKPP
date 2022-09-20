<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\View;

use App\Models\Event;
use App\Models\Tag;
use App\Models\Slider;
use App\Models\Service;
use App\Models\Category;
use App\Models\Download;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use App\Http\Controllers\Controller;
use App\Models\Contact;
use App\Models\Infografis;
use App\Models\Link;
use App\Models\News;
use App\Models\Photo;
use App\Models\Potensi;
use App\Models\Profile;
use App\Models\Profpeg;
use App\Models\Sosmed;
use App\Models\Video;
use Illuminate\Support\Facades\Http;

class PageController extends Controller
{
    public function index()
    {
        $postssatu = News::with('tags')->take(1)->latest()->get();
        $posts = News::with('tags')->take(4)->latest()->get();
        $events = Event::take(4)->latest()->get();
        $sliders = Slider::take(1)->latest()->get();
        $links = Link::latest()->get();
        $services = Service::latest()->get();
        $contact = Contact::find(1);
        $sosmeds = Sosmed::get();

        $profil = Profile::select('nama_opd', 'short_name', 'kata_sambutan', 'foto_pimpinan', 'logo', 'favicon', 'maklumat')->find(1);

        $infografis = Http::get('http://bolmongkab.go.id/api/infografis')['data']['data'];

        return view('opd.index', compact(
            'posts',
            'events',
            'sliders',
            'services',
            'postssatu',
            'infografis',
            'links',
            'contact',
            'sosmeds',
            'profil'
        ));
    }

    public function program()
    {
        $program = Profile::take(1)->latest()->get();
        return view('opd/detail/program', compact('program'));
    }

    public function pegawai()
    {
        $pegawai = Profpeg::latest()->get();
        return view('opd/detail/pegawai', compact('pegawai'));
    }

    public function tupoksi()
    {
        $tupoksi = Profile::take(1)->latest()->get();
        return view('opd/detail/tupoksi', compact('tupoksi'));
    }

    public function visimisi()
    {
        $visimisi = Profile::take(1)->latest()->get();
        return view('opd/detail/visimisi', compact('visimisi'));
    }

    public function foto()
    {
        $foto = Photo::latest()->paginate(12);
        return view('opd/detail/foto', compact('foto'));
    }
    public function video()
    {
        $video = Video::latest()->paginate(12);
        return view('opd/detail/video', compact('video'));
    }

    public function struktur()
    {
        $struktur = Profile::take(1)->latest()->get();
        return view('opd/detail/struktur', compact('struktur'));
    }

    public function dasarhukum()
    {
        $dasarhukum = Profile::take(1)->latest()->get();
        return view('opd/detail/dasarhukum', compact('dasarhukum'));
    }

    public function download()
    {
        $downloads = Download::latest()->paginate(5);
        return view('opd/detail/download', compact('downloads'));
    }

    public function getDownload(Request $request, $id)
    {
        $entry = Download::where('id', '=', $id)->firstOrFail();
        $pathToFile = storage_path() . "/app/public/" . $entry->file;
        return response()->download($pathToFile);
    }

    public function berita(Request $request)
    {
        $kategori = Category::latest()->get();
        $posts = News::latest()->Paginate(5);
        $sidebar = News::skip(5)->Paginate(5);
        $tags = Tag::get();

        return view('opd/detail/berita', compact('posts', 'kategori', 'sidebar', 'tags'));
    }

    public function beritaDetail(Request $request, $id)
    {
        if ($request->has('cari')) {
            $kategori = Category::latest()->get();
            $tags = Tag::latest()->get();
            $sidebar = News::skip(5)->Paginate(5);
            $posts = News::where('title', 'LIKE', '%' . $request->cari . '%')->with('kategori')->get();

            $expiresAt = now()->addHours(3);
            views($id)
                ->cooldown($expiresAt)
                ->record();

            return view('opd/detail/berita', compact('posts', 'kategori', 'sidebar', 'tags'));
        } else {
            $kategori = Category::latest()->simplePaginate(5);
            $posts = News::where('id', $id)->firstOrFail();
            $tags = Tag::latest()->get();
            $sidebar = News::skip(5)->Paginate(5);

            $expiresAt = now()->addHours(3);
            views($posts)
                ->cooldown($expiresAt)
                ->record();

            return view('opd/detail/berita-detail', compact('posts', 'sidebar', 'kategori', 'tags'));
        }
    }

    public function hascarberita(Request $request)
    {
        if ($request->has('cari')) {
            $kategori = Category::latest()->get();
            $tags = Tag::latest()->get();
            $sidebar = News::skip(5)->Paginate(5);
            $posts = News::where('title', 'LIKE', '%' . $request->cari . '%')->get();
        } else {
            $kategori = Category::latest()->simplePaginate(5);
            $posts = News::where('id', $id)->firstOrFail();
            $tags = Tag::latest()->get();
            $sidebar = News::skip(5)->Paginate(5);
        }
        return view('opd/detail/hascarberita', compact('posts', 'kategori', 'sidebar', 'tags'));
    }


    public function kategori(Category $category)
    {

        $kategori = Category::latest()->get();
        $tags = Tag::latest()->get();
        $sidebar = News::skip(5)->Paginate(5);
        $posts = $category->news()->latest()->paginate(4);

        return view('opd/detail/berita', compact('posts', 'kategori', 'sidebar', 'tags'));
    }

    public function tag(Tag $tag)
    {

        $kategori = Category::latest()->get();
        $tags = Tag::latest()->get();
        $sidebar = News::skip(5)->Paginate(5);
        $posts = $tag->news()->latest()->paginate(4);

        return view('opd/detail/berita', compact('posts', 'kategori', 'sidebar', 'tags'));
    }

    public function eventDetail(Event $events){
          
        return view('opd/detail/agenda-detail',compact('events'));
    }
}
