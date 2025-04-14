@extends('.theme')
@section('title'){{'Admin İletişim'}}@endsection

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
            <h1 class="font-semibold text-2xl text-indigo-900 mb-4">Site Ayarları</h1>

                <div class="border p-4 shadow rounded-md mt-4">
                    <div class="font-medium text-lg">Site Haritası (Sitemap) Oluştur</div>
                    <div class="mt-2">
                        <p class="my-2"><small>Site haritası şu adreste yayınlanacaktır: <a href="{{ url('/sitemap.xml') }}" target="_blank">{{ url('/sitemap.xml') }}</a></small></p>
                        <form action="{{ route('admin.sitemap.generate') }}" method="POST" onsubmit="return confirm('Mevcut site haritası dosyasının üzerine yazılacaktır. Devam etmek istiyor musunuz?');">
                            @csrf
                            <button type="submit" class="px-4 py-1 bg-indigo-900 text-white transition hover:bg-sky-700 rounded-md inline-block">Site Haritasını Oluştur / Güncelle</button>
                        </form>
                    </div>
                </div>



        </div>
    </section>
@endsection
