@extends('.theme')
@section('title'){{'Admin Sosyal Medya'}}@endsection

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
            <h1 class="font-semibold text-2xl text-indigo-900 mb-4">Sosyal Medya Kaydı</h1>
            <form action="{{ route('admin.social.post') }}" method="post">
                @csrf

                <div class="flex flex-col gap-4 p-4 border rounded shadow">
                    <input type="text" name="name" placeholder="Sosyal Medya Adı" class="py-2 px-4 w-full border focus:outline-none rounded-md bg-gray-100 focus:bg-white">
                    <input type="url" name="url" placeholder="URL Adresi" class="py-2 px-4 w-full border focus:outline-none rounded-md bg-gray-100 focus:bg-white">
                    <button type="submit" class="bg-indigo-950 text-white px-4 py-2 inline-block uppercase rounded-md transition hover:bg-sky-700"> Kaydet </button>
                </div>
            </form>
        </div>
    </section>

    <section class="px-4 lg:px-0 mt-8 bg-gray-100 h-auto py-4">
        <div class="container mx-auto">
            <table class="min-w-full">
                <thead class="bg-gray-50">
                <tr>
                    <th scope="col" class="px-3 py-3.5 text-left text-sm font-semibold text-gray-900">Sosyal Medya Adı</th>
                    <th scope="col" class="px-3 py-3.5 text-left text-sm font-semibold text-gray-900">Sosyal Medya Adresi</th>
                    <th scope="col" class="px-3 py-3.5 text-left text-sm font-semibold text-gray-900">Eylem</th>
                </tr>
                </thead>
                <tbody class="bg-white">
                @foreach($social as $soc)
                    <tr class="border-b">
                        <td class="px-3 py-4 text-sm text-gray-500">{{ $soc->name }}</td>
                        <td class="px-3 py-4 text-sm text-gray-500">{{ $soc->url }}</td>
                        <td class="px-3 py-4 text-sm text-gray-500">
                            <a href="{{ route('admin.social.delete', $soc->id) }}" class="px-4 py-2 inline-block border bg-amber-900 text-white rounded-md hover:bg-amber-700"><i class="bi bi-trash"></i> Sil</a>
                        </td>
                    </tr>
                @endforeach
                </tbody>
            </table>
        </div>
    </section>

@endsection
