<x-weekly-published>
    <x-slot name="metaTitle">{{ $title ?? Str::title($collection) }}</x-slot>
    <x-slot name="metaDescription">{{ $description }} do RPG do Mestre</x-slot>
    <div class="prose prose-{{ $color }} prose-sm sm:prose lg:prose-lg xl:prose-2xl mx-auto py-20">
        <h1>{{ Str::title($collection) }}</h1>
        <div>
            <div class="flex flex-wrap -m-12">
            @forelse ($chunk as $entry)
                @php
                    $yaml = $entry['yaml'];
                    $body = $entry['body'];
                    $url = $entry['url'];
                @endphp
                <div class="p-12 md:w-1/2 flex flex-col items-start">
                    <h3 class="sm:text-3xl text-2xl title-font font-medium text-gray-900 mt-4 mb-4">{{ $yaml['title'] }}</h2>
                    <p class="leading-relaxed mb-8">{{ $yaml['description'] }}</p>
                    <a class="text-indigo-500 inline-flex items-center" href="{{ $url }}">Ler mais &raquo;</a>
                </div>
            @empty
                <div class="p-12 md:w-1/2 flex flex-col items-start">
                    <h3 class="sm:text-3xl text-2xl title-font font-medium text-gray-900 mt-4 mb-4">Nenhum item</h2>
                    <p class="leading-relaxed mb-8">Infelizmente, tivemos uma falha crítica e ainda não publicamos algo aqui :(</p>
                </div>
            @endforelse
            </div>
            @if ($previous !== '' || $next !== '')
            <div class="flex flex-wrap -m-12">
                <div class="p-12 flex flex-col items-start">
                    @if ($previous !== '')
                    <div><a href="/{{ $collection }}/{{ $previous }}">Anterior</a></div>
                    @endif
                    @if ($next !== '')
                    <div><a href="/{{ $collection }}/{{ $next }}">Próximo</a></div>
                    @endif
                </div>
            </div>
            @endif
        </div>
    </div>
</x-weekly-published>
