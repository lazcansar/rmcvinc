@extends('theme')
@section('title'){{'Giriş Yap'}}@endsection
@section('description'){{'Elis Kepenk Giriş Sayfası'}}@endsection
@section('main')
    @php
        $breadcrumbItems = [
            ['label' => 'Anasayfa', 'url' => '/'],
            ['label' => 'Giriş Yap', 'image' => '/bread-crumb.webp', 'url' => '#'],
        ];
    @endphp
    <x-bread-crumb :items="$breadcrumbItems"/>

    <section class="px-4 lg:px-0 my-8">
        <div class="container mx-auto lg:w-[540px]">
            <div class="p-4 border rounded-md shadow">
                <h1 class="font-bold text-2xl text-indigo-950 mb-4">Giriş Paneli</h1>
                <form action="{{ route('login.post') }}" method="post">
                    @csrf

                    <div class="flex flex-col gap-4">
                        <input type="email" name="email" class="py-2 px-4 w-full border focus:outline-none rounded-md bg-gray-100 focus:bg-white" placeholder="E-Posta">
                        <input type="password" name="password" class="py-2 px-4 w-full border focus:outline-none rounded-md bg-gray-100 focus:bg-white" placeholder="*******">
                        <button type="submit" class="bg-indigo-950 text-white px-4 py-2 inline-block uppercase rounded-md transition hover:bg-sky-700">Giriş Yap</button>
                    </div>
                </form>
            </div>
        </div>
    </section>

@endsection
