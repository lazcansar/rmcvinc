<!doctype html>
<html lang="tr">
<head>
    @php
    // Todo: Logo ve Resimleri ayarları LD+JSON Dosyası için
    @endphp
    <meta charset="UTF-8">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>@yield('title') - Gebze Kiralık Vinç</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])

    <meta name="description" content="@yield('description')">
    <meta name="keywords" content="@yield('keywords')">
    <meta name="robots" content="index, follow">
    <!-- Social Media Meta Tags -->
    <meta property="og:type" content="website"/>
    <meta property="og:title" content="@yield('title') - Gebze Kiralık Vinç">
    <meta property="og:description" content="@yield('description')">
    <meta property="og:site_name" content="Elis Kepenk">
    <meta property="og:url" content="{{ URL::current() }}">
    <meta property="og:image" content="{{ asset("/storage/images/theme/logo.png") }}"/>
    <meta property="og:image:type" content="image/svg+xml">
    <meta property="og:locale" content="tr_TR"/>
    <!-- Social Media Meta Tags -->

    <link rel="canonical" href="{{ URL::current() }}">
    <x-head.tinymce-config />
    @php
        $title = $__env->yieldContent('title');
        $description = $__env->yieldContent('description');
    @endphp

    <script type="application/ld+json">
        {
          "@context": "https://schema.org",
          "@graph": [
            {
              "@type": "Organization",
              "@id": "https://rmcvinc.com/#organization",
              "name": "Gebze RMC Vinç Kiralama",
              "url": "https://rmcvinc.com",
              "description": "Gebze Vinç Kiralama, Sepetli Vinç Kiralama, Manlift Kiralama, Forklift Kiralama firması olarak hizmet veriyoruz.",
              "logo": {
                "@type": "ImageObject",
                "url": "https://eylulhaliyikamaustasi.com/images/eylul-hali-yikama-logo.png",
                "width": 200,
                "height": 100
              },
              "address": {
                "@type": "PostalAddress",
                "streetAddress": "Kirazpınar Mah. Şehit Ali Gaffar Okan Cad. 2780 Sk. 41400 No:5",
                "addressLocality": "Kocaeli",
                "addressRegion": "Gebze",
                "postalCode": "41400",
                "addressCountry": "TR"
              },
              "telephone": "+905346557630",
            },
            {
              "@type": "WebSite",
              "@id": "https://rmcvinc.com/#website",
              "url": "https://rmcvinc.com",
              "name": "Gebze Vinç Kiralama - Kiralık Vinç",
              "description": "Gebze Vinç Kiralama, Sepetli Vinç Kiralama, Manlift Kiralama, Forklift Kiralama firması olarak hizmet veriyoruz.",
              "publisher": {
                "@id": "https://rmcvinc.com/#organization"
              }
            },
            {
              "@type": "WebPage",
              "@id": "https://rmcvinc.com/#webpage",
              "url": "{{ URL::current() }}",
              "name": "{{ $title }} - Gebze Kiralık Vinç",
              "isPartOf": {
                "@id": "https://rmcvinc.com/#website"
              },
              "description": "{{ $description }}",
              "inLanguage": "tr-TR",
              "primaryImageOfPage":{
                  "@type":"ImageObject",
                  "url":"https://eylulhaliyikamaustasi.com/storage/images/eylul-hali-yikama-logo.png"
              }
            }
          ]
        }
    </script>

    @yield('style')
</head>
<body>
@php
$contact = \App\Models\Contact::latest()->first();
$social = \App\Models\Social::all();
    @endphp
<header class="sticky top-0 z-50">
    <section class="hidden lg:block px-4 lg:px-0 bg-amber-800 py-2 text-sm">
        <div class="container mx-auto">
            <div class="flex flex-row flex-wrap justify-between">
                <a href="mailto:{{ $contact->email ?? '' }}" class="text-white"><i class="bi bi-envelope-check-fill"></i> {{ $contact->email ?? '' }}</a>
                <a href="tel:{{ $contact->phone ?? '' }}" class="text-white"><i class="bi bi-telephone-outbound-fill"></i> {{ $contact->phone ?? '' }}</a>
                <a href="{{ route('contact') }}" class="text-white"><i class="bi bi-geo-alt"></i> {{ $contact->address }}</a>
            </div>
        </div>
    </section>

    <nav class="hidden md:block bg-white py-4">
        <div class="container mx-auto">
            <div class="flex flex-row flex-wrap items-center justify-between">
                <div class="flex-auto lg:text-3xl flex items-center gap-2 font-bold">
                    <a href="{{ route('home') }}">
                        <img src="{{ asset("/storage/images/rmc-gebze-sepetli-vinc.png") }}" class="h-12 inline-block" alt="Gebze Kiralık Vinç Logo" title="Gebze Kiralık Vinç">
                    </a>
                </div>
                <div class="flex-auto">
                    <ul class="flex flex-row flex-wrap gap-4 uppercase">
                        <li><a href="{{ route('home') }}" class="font-semibold text-amber-700 transition hover:text-indigo-950">Anasayfa</a></li>
                        <li><a href="{{ route('about') }}" class="font-semibold text-amber-700 transition hover:text-indigo-950">Kurumsal</a></li>
                        <li><a href="{{ route('services') }}" class="font-semibold text-amber-700 transition hover:text-indigo-950">Hizmetler</a></li>
                        <li><a href="{{ route('gallery') }}" class="font-semibold text-amber-700 transition hover:text-indigo-950">Galeri</a></li>
                        <li><a href="{{ route('blog') }}" class="font-semibold text-amber-700 transition hover:text-indigo-950">Blog</a></li>
                        <li><a href="{{ route('contact') }}" class="font-semibold text-amber-700 transition hover:text-indigo-950">İletişim</a></li>
                    </ul>
                </div>
                <div class="flex-auto text-xl font-medium text-green-600">
                    <a href="https://api.whatsapp.com/send?phone=9{{ str_replace(' ', '', $contact->whatsapp ?? '') }}" target="_blank" class="py-1 px-4 bg-green-600 transition hover:bg-green-500 text-white rounded-lg inline-flex gap-2"><i class="bi bi-whatsapp"></i> <span class="hidden lg:block">Whatsapp</span></a>
                </div>

            </div>
        </div>
    </nav>

    <nav class="px-4 md:hidden bg-white py-4">
        <div class="container mx-auto">
            <div class="flex flex-col gap-y-4 justify-between">
                <div class="w-full text-3xl flex items-center gap-2 font-bold justify-between">
                    <div class="text-indigo-950">
                        <a href="{{ route('home') }}">
                            <img src="{{ asset("/storage/images/rmc-gebze-sepetli-vinc.png") }}" class="h-12 inline-block" alt="">
                        </a>
                    </div>
                    <div>
                        <button id="mobile-button"><i class="bi bi-list"></i></button>
                    </div>
                </div>
                <div id="mobile-menu" class="w-full hidden">
                    <ul class="flex flex-col flex-wrap uppercase">
                        <li class="border-b py-2"><a href="{{ route('home') }}" class="font-semibold text-indigo-900 transition hover:text-indigo-950">Anasayfa</a></li>
                        <li class="border-b py-2"><a href="{{ route('about') }}" class="font-semibold text-indigo-900 transition hover:text-indigo-950">Kurumsal</a></li>
                        <li class="border-b py-2"><a href="{{ route('services') }}" class="font-semibold text-indigo-900 transition hover:text-indigo-950">Hizmetler</a></li>
                        <li class="border-b py-2"><a href="{{ route('gallery') }}" class="font-semibold text-indigo-900 transition hover:text-indigo-950">Galeri</a></li>
                        <li class="border-b py-2"><a href="{{ route('blog') }}" class="font-semibold text-indigo-900 transition hover:text-indigo-950">Blog</a></li>
                        <li class="border-b py-2"><a href="{{ route('contact') }}" class="font-semibold text-indigo-900 transition hover:text-indigo-950">İletişim</a></li>
                        <li class="py-2"><a href="https://api.whatsapp.com/send?phone=9{{ str_replace(' ', '', $contact->whatsapp ?? '') }}" target="_blank" class="py-1 px-4 bg-green-600 transition hover:bg-green-500 text-white rounded-lg inline-block"><i class="bi bi-whatsapp"></i> Whatsapp</a></li>
                    </ul>
                </div>

            </div>
        </div>
    </nav>

</header>

<main>

    @yield('main')

</main>

<footer>
    <section class="fixed bottom-0 z-10 left-[50%] -translate-x-1/2 flex justify-center">
        <div class="bg-amber-600 text-white p-4 rounded-tl">
            <a href="https://api.whatsapp.com/send?phone=9{{ str_replace(' ', '', $contact->whatsapp ?? '') }}"><i class="bi bi-whatsapp"></i> Whatsapp</a>
        </div>
        <div class="bg-amber-500 text-white p-4 rounded-tr">
            <a href="tel:{{ $contact->phone ?? '' }}"><i class="bi bi-telephone-plus"></i> Hemen Ara</a>
        </div>

    </section>
    <section class="px-4 lg:px-0 bg-neutral-800 py-8">
        <div class="container mx-auto">
            <div class="flex flex-col sm:flex-row flex-wrap gap-y-4">
                <div class="w-full md:w-full lg:w-3/6 lg:pe-8">
                    <h4 class="text-white text-2xl font-semibold uppercase">Gebze Kiralık Vinç, Sepetli Vinç</h4>
                    <p class="my-4 text-gray-100 leading-relaxed">Gebze RMC Vinç kiralama firması olarak, müşterilerimize vinç kiralama, manlift kiralama, forklift kiralama, sepetli vinç kiralama ve makaslı platform kiralama hizmetleri sunuyoruz. Vinç kiralama fiyatları için bizimle iletişime geçin! </p>
                </div>
                <div class="w-full sm:w-1/2 md:w-1/3 lg:w-1/6 lg:pe-2">
                    <h4 class="text-white text-2xl font-semibold">Bağlantılar</h4>
                    <ul class="my-4 flex flex-col gap-2">
                        @php
                        $services = \App\Models\Services::all();
                        @endphp
                        @foreach($services as $service)
                            <li><a href="{{ route('service.detail', $service->slug) }}" class="text-white"><i class="bi bi-arrow-right-short"></i> {{ $service->title }}</a></li>
                        @endforeach
                    </ul>
                </div>
                <div class="w-full sm:w-1/2 md:w-1/3 lg:w-1/6">
                    <h4 class="text-white text-2xl font-semibold">Kurumsal</h4>
                    <ul class="my-4 flex flex-col gap-2">
                        <li><a href="{{ route('about') }}" class="text-white">Hakkımızda</a></li>
                        <li><a href="{{ route('services') }}" class="text-white">Hizmetler</a></li>
                        <li><a href="{{ route('gallery') }}" class="text-white">Galeri</a></li>
                        <li><a href="{{ route('blog') }}" class="text-white">Blog</a></li>
                        <li><a href="{{ route('contact') }}" class="text-white">İletişim</a></li>
                    </ul>
                </div>
                <div class="w-full md:w-1/3 lg:w-1/6">
                    <h4 class="text-white text-2xl font-semibold">İletişim</h4>
                    <ul class="my-4 flex flex-col gap-6">
                        <li><a href="{{ route('contact') }}" class="text-white flex flex-row items-center gap-1"><i class="bi bi-geo-alt p-2 bg-cyan-600 text-white rounded-full"></i>
                                {{ $contact->address ?? '' }}</a></li>
                        <li><a href="tel:{{ $contact->phone ?? '' }}" class="text-white"><i class="bi bi-phone p-2 bg-cyan-600 text-white rounded-full"></i> {{ $contact->phone ?? '' }}</a></li>
                        <li><a href="https://api.whatsapp.com/send?phone=9{{ str_replace(' ', '', $contact->whatsapp ?? '') }}" class="text-white"><i class="bi bi-whatsapp p-2 bg-cyan-600 text-white rounded-full"></i> {{ $contact->whatsapp ?? '' }} </a></li>
                        <li><a href="mailto:{{ $contact->email ?? '' }}" class="text-white"><i class="bi bi-envelope p-2 bg-cyan-600 text-white rounded-full"></i> {{ $contact->email ?? '' }}</a></li>
                    </ul>
                </div>
            </div>

        </div>
    </section>
    <section class="px-4 lg:px-0 bg-neutral-600 py-4 text-sm">
        <div class="container mx-auto">
            <div class="flex flex-wrap flex-col md:flex-row items-center">
                <div class="md:w-1/2 text-white">
                    <p>Copyright &copy {{ date("Y") }} <a href="{{ route('home') }}">RMCVinc.com</a> | Gebze Vinç Kiralama - Kiralık Vinç - Sepetli Vinç Kiralama</p>
                </div>
                <div class="md:w-1/2 text-white md:text-end">
                    <p>Tasarım & Kodlama <i class="bi bi-heart-fill"></i> <a href="https://afyazilim.com" target="_blank" class="hover:underline">A&F Yazılım ve E-Ticaret Hizmetleri</a></p>
                </div>
            </div>
        </div>
    </section>
</footer>
</body>
</html>
