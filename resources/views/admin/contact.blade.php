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
            <h1 class="font-semibold text-2xl text-indigo-900 mb-4">İletişim Bilgileri</h1>
                <form action="{{ route('admin.contact.post') }}" method="post">
                    @csrf

                    <div class="flex flex-col gap-4 p-4 border rounded shadow">
                        <input type="text" name="address" placeholder="Adres Bilgisi" class="py-2 px-4 w-full border focus:outline-none rounded-md bg-gray-100 focus:bg-white" value="{{ $contact->address ?? '' }}">
                        <input type="tel" name="phone" placeholder="Telefon Numarası" class="py-2 px-4 w-full border focus:outline-none rounded-md bg-gray-100 focus:bg-white" value="{{ $contact->phone ?? '' }}">
                        <input type="tel" name="whatsapp" placeholder="Whatsapp Numarası" class="py-2 px-4 w-full border focus:outline-none rounded-md bg-gray-100 focus:bg-white" value="{{ $contact->whatsapp ?? '' }}">
                        <input type="email" name="email" placeholder="E-Posta Adresi" class="py-2 px-4 w-full border focus:outline-none rounded-md bg-gray-100 focus:bg-white" value="{{ $contact->email ?? '' }}">
                        <button type="submit" class="bg-indigo-950 text-white px-4 py-2 inline-block uppercase rounded-md transition hover:bg-sky-700">
                            {{ $contact->exists ? 'Güncelle' : 'Kaydet' }}</button>
                    </div>
                </form>
            </div>
    </section>
@endsection
