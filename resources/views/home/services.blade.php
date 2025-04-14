@extends('theme')
@section('title'){{'Hizmetler'}}@endsection
@section('description'){{'Elis Kepenk firması olarak kepenk tamiri, otomatik kepenk sistemleri, kepenk servis hizmeti ve daha fazlası...'}}@endsection
@section('main')

    @php
        $breadcrumbItems = [
            ['label' => 'Anasayfa', 'url' => '/'],
            ['label' => 'Hizmetler', 'image' => 'theme/kurumsal-bread.webp', 'url' => '#'],
        ];
    @endphp
    <x-bread-crumb :items="$breadcrumbItems"/>

    <section class="px-4 lg:px-0 py-8 bg-gray-50">
        <div class="container mx-auto">
            <h1 class="text-4xl text-center font-bold text-indigo-900">Hizmet Alanlarımız</h1>
            <p class="text-center text-gray-700 mt-2">Elis Kepenk olarak, kepenk, kepenk tamiri, kepenk servisi ve kepenk motoru gibi konularda uzmanlaşmış bir firma olarak, müşterilerimize en kaliteli ve güvenilir hizmeti sunmayı amaçlıyoruz. Yılların verdiği deneyim ve uzman kadromuz ile her türlü kepenk ihtiyacınıza çözüm üretiyoruz.</p>
            <div class="flex flex-col md:flex-row flex-wrap gap-y-4 mt-8">
                @foreach($services as $service)
                    <x-services-card :service="$service"></x-services-card>
                @endforeach
            </div>
            {{ $services->links() }}
        </div>
    </section>

@endsection
