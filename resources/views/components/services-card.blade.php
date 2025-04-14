<article class="w-full md:w-1/3 lg:w-1/4 p-2" data-aos="zoom-in">
    <div class="p-4 bg-white border shadow hover:shadow-md rounded-md transition hover:-translate-y-1">
        <a href="{{ route('service.detail', $service->slug) }}" class="relative block image-hover">
            <img src="{{ asset("/storage/$service->image_path") }}" class="w-full object-contain rounded-lg">
            <span class="image-arrow absolute bg-amber-700 text-4xl p-4 rounded-full left-1/2 top-1/2 -translate-x-1/2 -translate-y-1/2 z-50 transition opacity-0"><i class="bi bi-arrow-up-right-circle-fill text-white"></i></span>
        </a>
        <div class="flex flex-row flex-wrap justify-between items-center my-2">
            <span class="text-gray-700">{{ $service->updated_at->format('d.m.Y') }}</span>
        </div>
        <a href="{{ route('service.detail', $service->slug) }}" class="text-xl text-amber-700 font-medium">
           {{ $service->title }}
        </a>
        <p class="leading-relaxed text-gray-700 my-2">{{  Str::limit(strip_tags($service->meta_description, 150)) }}</p>
        <a href="{{ route('service.detail', $service->slug) }}" class="rounded-lg bg-amber-700 text-white transition hover:bg-amber-800 px-4 py-2 inline-block">Devamını Oku</a>
    </div>
</article>
