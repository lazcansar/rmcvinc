@extends('theme')
@section('title'){{$blog->title}}@endsection
@section('description'){{$blog->meta_description}}@endsection
@section('style')
    <style>
        article p {
            line-height: 1.625;
            margin: 0.25rem 0;
            color: #374151;
        }
    </style>
@endsection
@section('main')

    @php
        $breadcrumbItems = [
            ['label' => 'Anasayfa', 'url' => '/'],
            ['label' => 'Blog', 'image' => '/bread-crumb.webp', 'url' => '/blog'],
            ['label' => "$blog->title"]
        ];
    @endphp
    <x-bread-crumb :items="$breadcrumbItems"/>

    <section class="px-4 lg:px-0 py-8 bg-gray-50">
        <div class="container mx-auto">
            <div class="flex flex-col md:flex-row flex-wrap">
                <article class="w-full md:w-2/3 md:pe-8">
                    <img src="{{ asset("/storage/$blog->image_path") }}" alt="{{ $blog->title }}" class="rounded shadow w-full object-cover max-h-72 mb-4">
                    <div class="flex flex-row items-center justify-between">
                        <span class="text-indigo-950">{{ $blog->updated_at->format("d.m.Y") }}</span>
                    </div>
                    <h1 class="text-4xl font-semibold text-indigo-900">{{ $blog->title }}</h1>
                    {!! $blog->description !!}

                </article>
                <div class="w-full md:w-1/3">
                    <div class="p-4 bg-gray-100 border">
                        <h3 class="text-xl font-medium text-indigo-900 mb-2">Son Blog Yazıları</h3>
                        <ul>
                            @foreach($blogs as $blogList)
                                <li class="py-2 border-b text-indigo-950"><a href="{{ route('blog.detail', $blogList->slug) }}" class="ms-0 transition-all hover:ms-1"><i class="bi bi-box-arrow-right"></i> {{ $blogList->title }}</a></li>
                            @endforeach
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </section>

@endsection
