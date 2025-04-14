@extends('theme')
@section('title'){{'Galeri'}}@endsection
@section('description'){{'Elis Kepenk firması olarak çalışmalara ait fotoğrafları bulabileceğiniz galeri sayfasıdır'}}@endsection
@section('main')

    @php
        $breadcrumbItems = [
            ['label' => 'Anasayfa', 'url' => '/'],
            ['label' => 'Galeri', 'image' => '/bread-crumb.webp', 'url' => '#'],
        ];
    @endphp
    <x-bread-crumb :items="$breadcrumbItems"/>

    <section class="px-4 lg:px-0 py-8 bg-gray-50">
        <div class="container mx-auto">
            <h1 class="text-4xl text-center font-bold text-amber-700"><i class="bi bi-images"></i> Galeri</h1>
            <p class="text-center text-gray-700 mt-2">Elis Kepenk olarak yapmış olduğunuz çalışmalara ait fotoğraflar...</p>
            <div class="my-4 flex flex-col sm:flex-row flex-wrap gallery-container">
                @foreach($images as $image)
                    @php
                        $imagename = basename($image);
                    @endphp
                    <div class="w-full sm:w-1/2 md:w-1/3 lg:w-1/4 p-2" data-aos="zoom-in">
                        <img src="{{ asset("/storage/images/gallery/$imagename") }}" class="gallery-image w-full rounded-lg shadow border p-1 cursor-pointer aspect-square">
                    </div>
                @endforeach

            </div>

            <x-modal></x-modal>


        </div>
    </section>

@endsection
