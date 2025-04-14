<nav aria-label="breadcrumb" class="bg-center bg-no-repeat bg-cover">
    <div class="relative">
        @foreach($items as $item)
            @if(isset($item['image']))
                <img src="{{ asset('/storage/images/' . $item['image']) }}" class="w-full brightness-50 h-[300px] lg:h-[300px] object-cover">
            @endif
        @endforeach
        <div class="absolute z-10 top-1/2 left-1/2 -translate-x-1/2 -translate-y-1/2 text-center">
            @foreach ($items as $item)
                @if ($loop->last)
                    <h1 class="text-white text-2xl md:text-4xl font-semibold my-4">{{ $item['label'] }}</h1>
                @endif
            @endforeach

            <ol class="flex flex-row flex-wrap gap-4 justify-center text-sm md:text-lg">
                @foreach ($items as $item)
                    @if ($loop->last)
                        <li class="text-white" aria-current="page">{{ $item['label'] }}</li>
                    @else
                        <li class="font-medium text-gray-100"><a href="{{ $item['url'] }}">{{ $item['label'] }}</a></li>
                        <span class="text-white">/</span>
                    @endif
                @endforeach
            </ol>
        </div>
    </div>
</nav>
