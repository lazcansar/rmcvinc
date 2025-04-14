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
            <div class="rounded-lg mb-4">
                <img src="{{ asset("storage/images/theme/firma.webp") }}" alt="kepenk sistemleri" class="w-full object-cover rounded-lg shadow-xl" data-aos="zoom-in">
            </div>
            <div class="flex flex-col md:flex-row flex-wrap gap-y-4">
                <div class="w-full md:w-3/4 md:pe-8" data-aos="fade-right">
                    <h1 class="text-4xl font-semibold mb-2">Elis Kepenk</h1>
                    <p class="leading-relaxed text-gray-700">Elis Kepenk olarak, kepenk sistemlerinde güvenlik, estetik ve konforu bir araya getiriyoruz. Uzman kadromuz ve geniş ürün yelpazemizle, evinizden iş yerinize kadar her türlü mekana uygun çözümler sunuyoruz. Güvenliğinizi ve konforunuzu en üst düzeyde tutmak için buradayız.</p>
                    <h2 class="text-2xl font-semibold my-2">Estetik ve Güvenli Kepenk Çözümleri</h2>
                    <p class="leading-relaxed text-gray-700">Mekanlarınızın güvenliğini sağlarken estetik görünümünden de ödün vermek istemiyorsanız, doğru yerdesiniz. Elis Kepenk olarak, alüminyumdan çeliğe, otomatik sistemlerden manuel sistemlere kadar geniş bir kepenk yelpazesi sunuyoruz. Her türlü ihtiyacınıza ve zevkinize uygun çözümlerimizle, mekanlarınıza değer katıyoruz.</p>
                    <h2 class="text-2xl font-semibold my-2">Hızlı ve Güvenilir Kepenk Tamiri</h2>
                    <p class="leading-relaxed text-gray-700">Kepenklerinizde meydana gelen arızalar, güvenliğinizi ve günlük hayatınızı olumsuz etkileyebilir. Elis Kepenk olarak, uzman teknik ekibimizle hızlı ve güvenilir kepenk tamiri hizmeti sunuyoruz. Yay değişiminden lamel değişimine, motor tamirinden merkezi sistem arızalarına kadar her türlü sorunu en kısa sürede çözüme kavuşturuyoruz.</p>
                    <h2 class="text-2xl font-semibold my-2">7/24 Kepenk Servisi</h2>
                    <p class="leading-relaxed text-gray-700">Acil durumlarda veya ani arızalarda yanınızda olmak için 7/24 kepenk servisi sunuyoruz. İster gece, ister gündüz, bize ulaşabilirsiniz. Deneyimli teknik ekibimiz, en kısa sürede adresinize gelerek sorununuzu çözüme kavuşturacaktır.</p>
                    <h2 class="text-2xl font-semibold my-2">Her Bütçeye Uygun Kepenk Fiyatları</h2>
                    <p class="leading-relaxed text-gray-700">Kepenk fiyatları, malzemenin türüne, boyutuna, mekanizmasına ve özelliklerine göre değişiklik gösterir. Elis Kepenk olarak, her bütçeye uygun kepenk seçenekleri sunuyoruz. Ücretsiz keşif hizmetimizle, mekanınıza özel fiyat teklifi alabilir, taksitli ödeme seçeneklerimizle bütçenizi zorlamadan kaliteli kepenk sistemlerine sahip olabilirsiniz.</p>
                </div>
                <div class="w-full md:w-1/4" data-aos="fade-left">
                    <h3 class="text-2xl font-medium mb-2 text-indigo-900">Misyonumuz</h3>
                    <p class="leading-relaxed text-gray-700">Müştelerimizin güvenlik ve konfor ihtiyaçlarını karşılayacak en kaliteli kepenk sistemlerini sunmak ve hızlı, güvenilir ve profesyonel kepenk tamiri ve servis hizmetleri ile müşteri memnuniyetini sağlamak.</p>
                    <h3 class="text-2xl font-medium mb-2 my-2 text-indigo-900">Vizyonumuz</h3>
                    <p class="leading-relaxed text-gray-700">Müşteri odaklı yaklaşımımızla sektörde fark yaratmak. Uluslararası standartlarda hizmet kalitesiyle sektörde örnek gösterilmek.</p>
                </div>
            </div>
        </div>
    </section>

@endsection
