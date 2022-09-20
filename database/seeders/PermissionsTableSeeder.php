<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Permission;

class PermissionsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //permission for news
        Permission::create(['name' => 'news.index']);
        Permission::create(['name' => 'news.create']);
        Permission::create(['name' => 'news.edit']);
        Permission::create(['name' => 'news.delete']);

        //permission for tags
        Permission::create(['name' => 'tags.index']);
        Permission::create(['name' => 'tags.create']);
        Permission::create(['name' => 'tags.edit']);
        Permission::create(['name' => 'tags.delete']);

        //permission for categories
        Permission::create(['name' => 'categories.index']);
        Permission::create(['name' => 'categories.create']);
        Permission::create(['name' => 'categories.edit']);
        Permission::create(['name' => 'categories.delete']);

        //permission for events
        Permission::create(['name' => 'events.index']);
        Permission::create(['name' => 'events.create']);
        Permission::create(['name' => 'events.edit']);
        Permission::create(['name' => 'events.delete']);

        //permission for photos
        Permission::create(['name' => 'photos.index']);
        Permission::create(['name' => 'photos.create']);
        Permission::create(['name' => 'photos.delete']);

        //permission for videos
        Permission::create(['name' => 'videos.index']);
        Permission::create(['name' => 'videos.create']);
        Permission::create(['name' => 'videos.edit']);
        Permission::create(['name' => 'videos.delete']);

        //permission for files
        Permission::create(['name' => 'files.index']);
        Permission::create(['name' => 'files.create']);
        Permission::create(['name' => 'files.edit']);
        Permission::create(['name' => 'files.delete']);

        //permission for banners
        Permission::create(['name' => 'banners.index']);
        Permission::create(['name' => 'banners.create']);
        Permission::create(['name' => 'banners.edit']);
        Permission::create(['name' => 'banners.delete']);

        //permission for services
        Permission::create(['name' => 'services.index']);
        Permission::create(['name' => 'services.create']);
        Permission::create(['name' => 'services.edit']);
        Permission::create(['name' => 'services.delete']);

        //permission for sliders
        Permission::create(['name' => 'sliders.index']);
        Permission::create(['name' => 'sliders.create']);
        Permission::create(['name' => 'sliders.delete']);

        //permission for infografis
        Permission::create(['name' => 'infografis.index']);
        Permission::create(['name' => 'infografis.create']);
        Permission::create(['name' => 'infografis.delete']);

        //permission for roles
        Permission::create(['name' => 'roles.index']);
        Permission::create(['name' => 'roles.create']);
        Permission::create(['name' => 'roles.edit']);
        Permission::create(['name' => 'roles.delete']);

        //permission for permissions
        Permission::create(['name' => 'permissions.index']);

        //permission for users
        Permission::create(['name' => 'users.index']);
        Permission::create(['name' => 'users.create']);
        Permission::create(['name' => 'users.edit']);
        Permission::create(['name' => 'users.delete']);

        //permission for profile
        Permission::create(['name' => 'profile.index']);
        Permission::create(['name' => 'profile.create']);
        Permission::create(['name' => 'profile.edit']);

        //permission for contact
        Permission::create(['name' => 'contact.index']);
        Permission::create(['name' => 'contact.create']);
        Permission::create(['name' => 'contact.edit']);
        Permission::create(['name' => 'contact.delete']);

        //permission for link
        Permission::create(['name' => 'link.index']);
        Permission::create(['name' => 'link.create']);
        Permission::create(['name' => 'link.edit']);
        Permission::create(['name' => 'link.delete']);

        //permission for sosmed
        Permission::create(['name' => 'sosmed.index']);
        Permission::create(['name' => 'sosmed.create']);
        Permission::create(['name' => 'sosmed.edit']);
        Permission::create(['name' => 'sosmed.delete']);

        //permission for download
        Permission::create(['name' => 'downloads.index']);
        Permission::create(['name' => 'downloads.create']);
        Permission::create(['name' => 'downloads.edit']);
        Permission::create(['name' => 'downloads.delete']);

        //permission for download
        Permission::create(['name' => 'profpegs.index']);
        Permission::create(['name' => 'profpegs.create']);
        Permission::create(['name' => 'profpegs.edit']);
        Permission::create(['name' => 'profpegs.delete']);

        //permission for visitor
        // Permission::create(['name' => 'visitor.index']);
        // Permission::create(['name' => 'visitor.create']);
        // Permission::create(['name' => 'visitor.edit']);
        // Permission::create(['name' => 'visitor.delete']);
    }
}
