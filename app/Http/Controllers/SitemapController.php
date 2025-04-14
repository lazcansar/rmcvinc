<?php

namespace App\Http\Controllers;

use App\Models\Blog;
use App\Models\Services;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Spatie\Sitemap\Sitemap;
use Spatie\Sitemap\Tags\Url;

class SitemapController extends Controller
{
    //
    public function generate(Request $request) {
        $sitemapPath = public_path('sitemap.xml');

        $sitemap = Sitemap::create();
        $sitemap->add(Url::create('/')->setLastModificationDate(Carbon::now())->setChangeFrequency(Url::CHANGE_FREQUENCY_DAILY)->setPriority(1.0));
        $sitemap->add(Url::create('/kurumsal')->setPriority(0.7));
        $sitemap->add(Url::create('/hizmetler')->setPriority(0.7));
        $sitemap->add(Url::create('/blog')->setPriority(0.7));
        $sitemap->add(Url::create('/galeri')->setPriority(0.7));
        $sitemap->add(Url::create('/iletisim')->setPriority(0.7));

        $services = Services::all();
        foreach ($services as $service) {
            $sitemap->add(Url::create(route('service.detail', $service->slug))
            ->setLastModificationDate($service->updated_at)
                ->setChangeFrequency(Url::CHANGE_FREQUENCY_WEEKLY)
                ->setPriority(0.9));
        }

        $blogs = Blog::all();
        foreach ($blogs as $blog) {
            $sitemap->add(Url::create(route('blog.detail', $blog->slug))
                ->setLastModificationDate($blog->updated_at)
                ->setChangeFrequency(Url::CHANGE_FREQUENCY_WEEKLY)
                ->setPriority(0.9));
        }

        $sitemap->writeToFile($sitemapPath);
        return redirect()->back()->with('success', 'Sitemap başarıyla oluşturuldu.');
    }
}
