@extends('theme')
@section('title'){{'Gebze Vinç Kiralama, Sepetli Vinç Kiralama'}}@endsection
@section('description'){{'Gebze vinç kiralama, kiralık vinç ve sepetli vinç kiralama ile manlift kiralama hizmetlerimiz bulunmaktadır.'}}@endsection
@section('keywords'){{'Gebze kiralık vinç, gebze vinç kiralama, sepetli vinç, manlift, forklift, makaslı platform, eklemli platform, manlift kiralama, forklift kiralama, sepetli vinç kiralama'}}@endsection
@section('main')

    <section>
        <div class="swiper slider">
            <div class="swiper-wrapper">
                <div class="swiper-slide relative">
                    <img src="{{ asset("/storage/images/gebze-vinc-kiralama-slider.webp") }}" alt="Gebze Kiralık Vinç" class="brightness-50 w-full min-h-[600px] lg:max-h-[500px] object-cover">
                    <div class="absolute text-center md:text-start top-1/2 lg:left-16 lg:translate-x-16 -translate-y-1/2 md:w-[768px] px-4 lg:px-0">
                        <div class="md:text-3xl text-white font-bold mb-2">
                            <h1><i class="bi bi-command"></i> RMC VİNÇ</h1>
                        </div>
                        <div class="md:text-xl text-white font-semibold mb-2">
                            Gebze Vinç Kiralama, Sepetli Vinç Kiralama, Manlift Kiralama, Forklift Kiralama
                        </div>
                        <div class="md:text-lg text-white mb-2">
                            RMC Vinç olarak, ağır işlerinizi hafifletiyoruz. Kaldırma Gücünüz, Çözüm Ortağınız!
                        </div>
                        <a href="https://api.whatsapp.com/send?phone=9{{ str_replace(' ', '', $contact->whatsapp ?? '') }}" class="bg-amber-700 transition hover:bg-amber-800 text-white px-4 py-2 rounded inline-block"><i class="bi bi-whatsapp"></i> Hemen İletişime Geç</a>
                        <a href="tel:{{ $contact->phone ?? '' }}" class="bg-amber-600 transition hover:bg-amber-800 text-white px-4 py-2 rounded inline-block"><i class="bi bi-telephone-plus"></i> Hemen Ara</a>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section class="px-4 lg:px-0 py-8 services bg-white">
        <div class="container mx-auto">
            <h3 class="text-4xl font-bold text-amber-700 text-center">Hizmetlerimiz</h3>
            <p class="my-2 text-gray-700 text-center text-lg">Gebze Vinç Kiralama, Kiralık Vinç, Manlift Kiralama, Sepetli Vinç Kiralama, Forklift Kiralama, Eklemli Platform Kiralama ve Kiralık Makaslı Platform çeşitlerimiz ile hizmetinizdeyiz.</p>
            <div class="flex flex-col sm:flex-row flex-wrap">
                @foreach($services as $service)
                    <x-services-card :service="$service"></x-services-card>
                @endforeach
            </div>
        </div>
    </section>

    <section class="px-4 lg:px-0 py-8 bg-gray-100 about">
        <div class="container mx-auto">
            <h2 class="text-4xl text-center font-bold text-amber-700">Kurumsal</h2>
            <p class="text-center text-gray-700 mt-2 text-lg">RMC Vinç Platform olarak, Gebze vinç kiralama hizmeti veriyoruz.</p>
            <div class="flex flex-col-reverse md:flex-row flex-wrap items-center mt-8 gap-y-4">
                <div class="w-full md:w-1/2 md:pe-8">
                    <h3 class="uppercase text-3xl font-bold text-amber-700">RMC Vinç Platform</h3>
                    <p class="text-gray-700 leading-relaxed my-2">
                        Müşterilerine kaliteli ve güvenli bir şekilde hizmet sunmayı kendisine ilke edinmiş iş tecrübesi ile siz sayın müsterilerimizin vinç ve platform kiralamalarında ve operasyonlarında çözüm ortağınız olarak yanınızda olmak isteriz.
                    </p>
                    <p class="text-gray-700 leading-relaxed my-2">
                        Firmamız bünyesinde; Manlift, Forklift, Sepetli Vinç, Mobil Vinç, Makaslı Platform ve Eklemli Platform olmak üzere bir çok vinç çeşidi bulunmaktadır. Uzman kadromuz ile müşterilerimize her türlü ihtiyaca uygun profesyonel vinç kiralama hizmeti veriyoruz.
                    </p>
                    <a href="{{ route('about') }}" class="bg-sky-800 transition hover:bg-indigo-900 text-white px-4 py-2 rounded inline-block"><i class="bi bi-caret-right"></i> Kurumsal</a>
                </div>
                <div class="w-full md:w-1/2 md:pe-8">
                    <div class="relative">
                        <img src="{{ asset("/storage/images/gebze-rmc-vinc-kiralama.webp") }}" class="w-full rounded-lg shadow-md h-96 object-cover object-top" alt="RMC Vinç Kiralama firması" title="RMC Vinç Platform">
                    </div>
                </div>
            </div>
        </div>
    </section>


    <section class="px-4 lg:px-0 my-8 gallery">
        <div class="container mx-auto">
            <h3 class="text-4xl text-center font-bold text-amber-700">Galeri</h3>
            <p class="text-center text-gray-700 mt-2 text-lg">RMC Vinç Platform olarak yapmış olduğunuz çalışmalara ait fotoğraflar...</p>
            <div class="text-end">
                <a href="{{ route('gallery') }}" class="inline-block py-2 px-4 bg-indigo-900 transition hover:bg-sky-700 text-white rounded">Tüm Fotoğraflar</a>
            </div>
            <div class="my-4 flex flex-col sm:flex-row flex-wrap gallery-container">
                @foreach($images as $image)
                    @if($loop->iteration > 8)
                        @break
                    @endif
                    @php
                        $imagename = basename($image);
                    @endphp
                    <div class="w-full sm:w-1/2 md:w-1/3 lg:w-1/4 p-2 relative" data-aos="zoom-in">
                        <img src="{{ asset("/storage/images/gallery/$imagename") }}" class="gallery-image w-full rounded-lg shadow transition-shadow hover:shadow-lg border cursor-pointer aspect-square">
                        <div class="absolute right-[9px] bottom-[9px] text-4xl bg-white p-2 rounded-tl-xl cursor-pointer"><i class="bi bi-arrow-up-right-circle transition hover:rotate-45 text-sky-700"></i></div>
                    </div>
                @endforeach
            </div>

            <x-modal></x-modal>


        </div>
    </section>

    <section class="px-4 lg:px-0 my-8 blog bg-gray-100 py-8">
        <div class="container mx-auto">
            <h3 class="text-4xl font-bold text-amber-700 text-center">Blog</h3>
            <p class="my-2 text-gray-700 text-center text-lg">Yeni yazılarımız yayında! Keşfetmek için hemen tıklayın...</p>
            <div class="text-end">
                <a href="{{ route('blog') }}" class="inline-block py-2 px-4 bg-indigo-900 transition hover:bg-sky-700 text-white rounded">Tümünü görüntüle</a>
            </div>
            <div class="flex flex-col sm:flex-row flex-wrap">
                @foreach($blogs as $blog)
                    <x-blog-card :blog="$blog"></x-blog-card>
                @endforeach
            </div>
        </div>
    </section>

@endsection
