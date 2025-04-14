@extends('theme')
@section('title'){{'Gebze Vinç Kiralama, Sepetli Vinç Kiralama'}}@endsection
@section('description'){{'Gebze vinç kiralama, kiralık vinç ve sepetli vinç kiralama ile manlift kiralama hizmetlerimiz bulunmaktadır.'}}@endsection
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
                        <a href="tel:{{ $contact->phone ?? '' }}" class="bg-sky-800 transition hover:bg-indigo-950 text-white px-4 py-2 rounded inline-block"><i class="bi bi-telephone-plus"></i> Hemen Ara</a>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section class="px-4 lg:px-0 py-8 bg-gray-100 about">
        <div class="container mx-auto">
            <h3 class="text-4xl text-center font-bold text-indigo-950">Hakkımızda</h3>
            <p class="text-center text-gray-700 mt-2 text-lg">Bizi daha yakından tanıyın.</p>
            <div class="flex flex-col md:flex-row flex-wrap items-center mt-8 gap-y-4">
                <div class="w-full md:w-1/2 md:pe-8">
                    <div class="relative">
                        <img src="{{ asset("/storage/images/theme/garaj-kepenk.webp") }}" class="w-full rounded-lg shadow-md" alt="Elis Kepenk">
                        <span class="absolute -left-2 -bottom-2 bg-white p-4 rounded-lg shadow text-center"><strong class="text-4xl text-indigo-800">E</strong> <span class="block text-sky-800 font-medium text-xl">ELİS</span></span>
                    </div>
                </div>
                <div class="w-full md:w-1/2">
                    <h3 class="uppercase text-3xl font-bold text-indigo-950">Elis Kepenk</h3>
                    <p class="text-gray-700 leading-relaxed my-2">
                        Elis Kepenk firması olarak kepenk yapımı, kepenk tamiri ve kepenk servislerimiz ile müşterilerimize profesyonel hizmet veriyoruz. </p>
                    <p class="text-gray-700 leading-relaxed my-2">İstanbul ili Avrupa yakası ve Anadolu yakasında kepenk tamiri yapıyoruz. Bozulan veya onarılması gereken kepenk motorlarını tamir ediyoruz. Otomatik kepenk tamiri ile kepenkleriniz ilk günki sağlığına ulaşacak.</p>
                    <p class="text-gray-700 leading-relaxed my-2">İstanbul Kepenk Tamiri denildiğinde akla gelen firmalardan olan Elis Kepenk firmasının profesyonel hizmetlerinden yararlanmak için hemen bizimle iletişime geçin.</p>
                    <a href="{{ $contact->phone ?? '' }}" class="bg-indigo-900 transition hover:bg-sky-700 text-white px-4 py-2 rounded inline-block"><i class="bi bi-telephone"></i> {{ $contact->phone ?? '' }}</a>
                    <a href="{{ route('about') }}" class="bg-sky-800 transition hover:bg-indigo-900 text-white px-4 py-2 rounded inline-block"><i class="bi bi-caret-right"></i> Kurumsal</a>
                </div>

            </div>
        </div>
    </section>

    <section class="px-4 lg:px-0 my-8 gallery">
        <div class="container mx-auto">
            <h3 class="text-4xl text-center font-bold text-indigo-950">Galeri</h3>
            <p class="text-center text-gray-700 mt-2 text-lg">Elis Kepenk olarak yapmış olduğunuz çalışmalara ait fotoğraflar...</p>
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

    <section class="px-4 lg:px-0 py-8 services bg-gray-100">
        <div class="container mx-auto">
            <h3 class="text-4xl font-bold text-indigo-950 text-center">Hizmetlerimiz</h3>
            <p class="my-2 text-gray-700 text-center text-lg">Kepenk, Kepenk Tamiri, Kepenk Servisi, Otomatik Kepenk, Kepenk Motoru ve çok daha fazlası ...</p>
            <div class="flex flex-col sm:flex-row flex-wrap">
                @foreach($services as $service)
                    <x-services-card :service="$service"></x-services-card>
                @endforeach
            </div>
        </div>
    </section>

    <section class="px-4 lg:px-0 my-8 blog">
        <div class="container mx-auto">
            <h3 class="text-4xl font-bold text-indigo-950 text-center">Blog</h3>
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
