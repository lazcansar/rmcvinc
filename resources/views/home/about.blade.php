@extends('theme')
@section('title'){{'Kurumsal'}}@endsection
@section('description'){{'Elis Kepenk olarak, kepenk sistemlerinde güvenlik, estetik ve konforu bir araya getiriyoruz.'}}@endsection
@section('main')

    @php
        $breadcrumbItems = [
            ['label' => 'Anasayfa', 'url' => '/'],
            ['label' => 'Kurumsal', 'image' => '/bread-crumb.webp', 'url' => '#'],
        ];
    @endphp
    <x-bread-crumb :items="$breadcrumbItems"/>

    <section class="px-4 lg:px-0 my-8">
        <div class="container mx-auto">
            <div class="flex flex-col md:flex-row flex-wrap gap-y-4">
                <div class="w-full md:w-3/4 md:pe-8" data-aos="fade-right">
                    <h1 class="text-4xl font-semibold mb-2 text-amber-700">RMC Vinç Platform</h1>
                    <p class="leading-relaxed text-gray-700">Müşterilerine kaliteli ve güvenli bir şekilde hizmet sunmayı kendisine ilke edinmiş iş tecrübesi ile siz sayın müsterilerimizin vinç ve platform kiralamalrında ve operasyonlarında çözüm ortağınız olarak yanınızda olmak isteriz.</p>
                    <p class="leading-relaxed text-gray-700 my-2">Müşterilerine kaliteli ve güvenli bir şekilde hizmet sunmayı kendisine ilke edinmiş iş tecrübesi ile siz sayın müsterilerimizin vinç ve platform kiralamalrında ve operasyonlarında çözüm ortağınız olarak yanınızda olmak isteriz.</p>
                    <img src="{{ asset("/storage/images/rmc-gebze-sepetli-vinc.png") }}" alt="">
                </div>
                <div class="w-full md:w-1/4" data-aos="fade-left">
                    <h2 class="text-2xl font-medium mb-2 text-indigo-900">Misyonumuz</h2>
                    <p class="leading-relaxed text-gray-700">Sektörde en güncel ekipmanı, deneyimli personelleri ile siz değerli müşterilerimizin yükünü hafifletmek, doğru ekipmanlar ile güvenli hizmet sunmak yegane amacımızdır.</p>
                    <h3 class="text-2xl font-medium mb-2 my-2 text-indigo-900">Vizyonumuz</h3>
                    <p class="leading-relaxed text-gray-700">Sektördeki en güncel ekipmanları kullanmak. Deneyimli personellerimiz ile hızlı ve doğru hizmeti sunmak. Kaliteden ve güvenlikten taviz vermeden hizmet sunmak.</p>
                </div>
            </div>
        </div>
    </section>

@endsection
