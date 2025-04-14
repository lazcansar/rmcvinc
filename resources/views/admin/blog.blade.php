@extends('.theme')
@section('title'){{'Admin Blog'}}@endsection

@section('main')
    <x-admin-nav></x-admin-nav>

    <section class="px-4 lg:px-0 mt-8">
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
            @php
                $isUpdating = isset($serviceFind) && $serviceFind?->id;
                $formAction = $isUpdating ? route('admin.blog.update.post', $serviceFind->id) : route('admin.blog');
            @endphp
            <h1 class="font-semibold text-2xl text-indigo-900 mb-4">{{ $isUpdating ? 'Blog Güncelle' : 'Blog Kaydet' }}</h1>
            <form action="{{ $formAction }}" method="post" enctype="multipart/form-data">
                @csrf

                <div class="flex flex-col gap-4 p-4 border rounded shadow">
                    @if($isUpdating && $serviceFind->image_path)
                        <div class="mt-2">
                            <img src="{{ Storage::url($serviceFind->image_path) }}" alt="{{ $serviceFind->title }}" class="h-20 w-auto rounded">
                            <span class="text-xs text-gray-500">Mevcut resim. Yeni seçerseniz bu değişecektir.</span>
                        </div>
                    @endif
                    <input type="file" name="image_path" class="py-2 px-4 w-full border focus:outline-none rounded-md bg-gray-100 focus:bg-white">
                    <input type="text" name="title" placeholder="Başlık" class="py-2 px-4 w-full border focus:outline-none rounded-md bg-gray-100 focus:bg-white" value="{{ old('title', $serviceFind?->title ?? '') }}">
                    <input type="text" name="slug" class="py-2 px-4 w-full border focus:outline-none rounded-md bg-gray-100 focus:bg-white" placeholder="Slug" value="{{ old('slug', $serviceFind?->slug ?? '') }}">
                    <x-forms.tinymce-editor :value="$serviceFind?->description ?? ''" />
                    <textarea name="meta_description" class="py-2 px-4 w-full border focus:outline-none rounded-md bg-gray-100 focus:bg-white" placeholder="Meta Description">{{ old('meta_description', $serviceFind?->meta_description ?? '') }}</textarea>
                    <button type="submit" class="bg-indigo-950 text-white px-4 py-2 inline-block uppercase rounded-md transition hover:bg-sky-700">{{ $isUpdating ? 'Güncelle' : 'Kaydet' }}</button>
                </div>
            </form>
        </div>


        <section class="px-4 lg:px-0 mt-8 bg-gray-100 h-auto py-4">
            <div class="container mx-auto">
                <table class="min-w-full">
                    <thead class="bg-gray-50">
                    <tr>
                        <th scope="col" class="px-3 py-3.5 text-left text-sm font-semibold text-gray-900">Başlık</th>
                        <th scope="col" class="px-3 py-3.5 text-left text-sm font-semibold text-gray-900">Slug</th>
                        <th scope="col" class="px-3 py-3.5 text-left text-sm font-semibold text-gray-900">Eylem</th>
                    </tr>
                    </thead>
                    <tbody class="bg-white">
                    @foreach($services as $service)
                        <tr class="border-b">
                            <td class="px-3 py-4 text-sm text-gray-500">{{ $service->title }}</td>
                            <td class="px-3 py-4 text-sm text-gray-500">{{ $service->slug }}</td>
                            <td class="px-3 py-4 text-sm text-gray-500">
                                <a href="{{ route('admin.blog.delete', $service->id) }}" class="px-4 py-1 inline-block border bg-amber-900 text-white rounded-md hover:bg-amber-700"><i class="bi bi-trash"></i> Sil</a>
                                <a href="{{ route('admin.blog.update', $service->id) }}" class="px-4 py-1 inline-block border bg-green-600 text-white rounded-md hover:bg-amber-700"><i class="bi bi-pencil-square"></i> Güncelle</a>
                            </td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
            </div>
        </section>

    </section>
@endsection
