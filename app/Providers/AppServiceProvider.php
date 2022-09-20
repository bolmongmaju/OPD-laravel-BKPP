<?php

namespace App\Providers;

use App\Models\Contact;
use App\Models\Link;
use Illuminate\Support\ServiceProvider;

use App\Models\Profile;
use App\Models\Service;
use App\Models\Sosmed;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        $kontak = Contact::latest()->get();
        $profil = Profile::select('nama_opd', 'short_name', 'kata_sambutan', 'foto_pimpinan', 'logo', 'favicon', 'maklumat')->find(1);
        $links = Link::latest()->get();
        $services = Service::latest()->get();
        $contact = Contact::find(1);
        $sosmeds = Sosmed::get();

        View()->share('links', $links);
        View()->share('services', $services);
        View()->share('contact', $contact);
        View()->share('sosmeds', $sosmeds);
        View()->share('profil', $profil);
        View()->share('kontak', $kontak);
    }
}
