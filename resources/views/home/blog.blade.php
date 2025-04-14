@extends('theme')
@section('title'){{'Blog'}}@endsection
@section('description'){{'Elis Kepenk sistemleri blog sayfası'}}@endsection
@section('main')

    @php
        $breadcrumbItems = [
            ['label' => 'Anasayfa', 'url' => '/'],
            ['label' => 'Blog', 'image' => '/bread-crumb.webp', 'url' => '#'],
        ];
    @endphp
    <x-bread-crumb :items="$breadcrumbItems"/>

    <section class="px-4 lg:px-0 py-8 bg-gray-50">
        <div class="container mx-auto">
            <h1 class="text-4xl text-center font-bold text-indigo-900">Blog Sayfası</h1>
            <p class="text-center text-gray-700 mt-2"></p>
            <div class="flex flex-col md:flex-row flex-wrap gap-y-4 mt-8">
                @foreach($blogs as $blog)
                    <x-blog-card :blog="$blog"></x-blog-card>
                @endforeach
            </div>
            {{ $blogs->links() }}
        </div>
    </section>
@endsection
