@extends('.theme')
@section('title'){{'Admin Galeri'}}@endsection

@section('main')
    <x-admin-nav></x-admin-nav>

    <section class="px-4 lg:px-0 my-8">
        <div class="container mx-auto">
            @if(session('success'))
                <div class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded-mb relative mb-4" role="alert">
                    <strong class="font-bold">Başarılı!</strong>
                    <span class="block sm:inline">{{ session('success') }}</span>
                </div>
            @endif
                @if ($errors->any())
                    <div class="alert alert-danger">
                        <ul>
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif
            <h1 class="font-semibold text-2xl text-indigo-900 mb-4">Galeri Ekle</h1>
            <form action="{{ route('gallery.store') }}" method="post" enctype="multipart/form-data">
                @csrf

                <div class="flex flex-col gap-4 p-4 border rounded shadow">
                    <label class="block">
                        <input type="file" name="image_path[]" class="w-full border-gray-100" id="selectFile" multiple>
                    </label>
                    <button type="submit" class="bg-indigo-950 text-white px-4 py-2 inline-block uppercase rounded-md transition hover:bg-sky-700"> Kaydet </button>
                </div>
            </form>
        </div>
    </section>

    <section class="px-4 lg:px-0 my-8 bg-gray-100 h-auto">
        <div class="container mx-auto">
            <div class="flex flex-col sm:flex-row flex-wrap">
                @foreach($images as $image)
                    @php
                    $imagename = basename($image);
                    @endphp
                    <div class="w-full sm:w-1/2 md:w-1/6 p-2">
                        <img src="{{ asset("/storage/images/gallery/$imagename") }}" class="shadow rounded-t-md border w-full aspect-square">
                        <a href="{{ route('gallery.delete', $imagename) }}" class="block bg-amber-900 text-white text-center rounded-b-md">Sil</a>
                    </div>
                @endforeach
            </div>
        </div>
    </section>

@endsection
