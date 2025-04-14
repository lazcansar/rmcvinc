@extends('theme')
@section('title'){{'İletişim'}}@endsection
@section('description'){{'Elis Kepenk sistemleri iletişim numaramız ' . $contact->phone}}@endsection
@section('main')

    @php
        $breadcrumbItems = [
            ['label' => 'Anasayfa', 'url' => '/'],
            ['label' => 'İletişim', 'image' => 'theme/iletisim-bread.webp', 'url' => '#'],
        ];
    @endphp
    <x-bread-crumb :items="$breadcrumbItems"/>



    <section class="px-4 lg:px-0 my-8">
        <div class="container mx-auto">
            <div class="flex flex-col-reverse md:flex-row flex-wrap items-center gap-y-4">
                <div class="w-full md:w-2/5 md:pe-8" data-aos="fade-right">
                    <h2 class="text-4xl font-semibold mb-2">İletişim Formu</h2>
                    <p class="font-medium mb-4">Bizimle iletişime geçerek kepenk işlemleriniz hakkında bilgi alın!</p>
                    <form action="" method="POST">
                        @csrf
                        <div class="flex flex-col gap-4 border p-8 rounded-lg shadow-lg">
                            <input type="text" name="name" placeholder="Adınız" class="border px-4 py-2 rounded w-full outline-none focus:outline-none bg-gray-100 focus:bg-white">
                            <input type="email" name="email" placeholder="E-Posta" class="border px-4 py-2 rounded w-full outline-none focus:outline-none bg-gray-100 focus:bg-white">
                            <input type="tel" name="phone" placeholder="Telefon Numarası" class="border px-4 py-2 rounded w-full outline-none focus:outline-none bg-gray-100 focus:bg-white">
                            <textarea name="message" placeholder="Mesajınız..."  class="border px-4 py-2 rounded w-full outline-none focus:outline-none bg-gray-100 focus:bg-white" rows="5"></textarea>
                            <button type="submit" class="w-full bg-sky-700 text-white py-2 rounded transition hover:bg-sky-600 uppercase"><i class="bi bi-envelope"></i> Gönder</button>
                        </div>
                    </form>
                </div>
                <div class="w-full md:w-3/5" data-aos="fade-left">
                    <div class="bg-indigo-950 p-8 text-white rounded-lg shadow-md">
                        <h3 class="text-2xl mb-4">İletişim Bilgilerimiz</h3>
                        <ul class="flex flex-col gap-2">
                            <li class="flex gap-2 items-center"><i class="bi bi-map"></i> {{ $contact->address ?? '' }}</li>
                            <li class="flex gap-2 items-center"><a href="mailto:{{ $contact->email ?? '' }}"><i class="bi bi-envelope-check"></i> {{ $contact->email ?? '' }}</a></li>
                            <li class="flex gap-2 items-center"><a href="tel:{{ $contact->phone ?? '' }}"><i class="bi bi-phone"></i> {{ $contact->phone ?? '' }}</a></li>
                            <li class="flex gap-2 items-center"><a href="https://api.whatsapp.com/send?phone=9{{ str_replace(' ', '', $contact->whatsapp ?? '') }}"><i class="bi bi-whatsapp"></i> {{ $contact->whatsapp ?? ''}}</a></li>
                        </ul>
                        <ul class="flex gap-4 flex-wrap mt-4">
                            <li>Sosyal Medya</li>
                            @foreach($socials as $social)
                                <li><a href="{{ $social->url }}" target="_blank"><i class="bi bi-{{ strtolower($social->name) }}"></i></a></li>
                            @endforeach
                        </ul>
                    </div>
                    <div class="mt-4">
                        <iframe src="https://www.google.com/maps/embed?pb=!1m14!1m8!1m3!1d193253.6977194006!2d29.455379000000004!3d40.815024!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x14cadf9eeca1f933%3A0x8fe917799f2da00b!2zUk1DIFbEsE7DhyAmIFBMQVRGT1JN!5e0!3m2!1str!2str!4v1742589478010!5m2!1str!2str" height="300" loading="lazy" referrerpolicy="no-referrer-when-downgrade" class="rounded-lg w-full"></iframe>
                    </div>



                </div>
            </div>
        </div>
    </section>

@endsection
