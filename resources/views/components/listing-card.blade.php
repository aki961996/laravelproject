@props(['list'])

<x-card>
    <div class="flex">
        {{-- ternary operators --}}
        {{-- logo first undel true or false --}}
        <img class="hidden w-48 mr-6 md:block"
            src="{{$list->logo ? asset('/storage/' . $list->logo) : asset('/images/no-image.png')}}" alt="" />
        <div>
            <h3 class="text-2xl">
                <a href="/listings/{{encrypt($list->id)}}">{{$list->title}}</a>
                {{-- {{route('edit', encrypt($user->id))}} --}}
                {{-- <a href="{{ route('listings.show', ['id' => $list->id]) }}">{{ $list->title }}</a> --}}
            </h3>
            </h3>
            <div class="text-xl font-bold mb-4">{{$list->company}}</div>
            <x-listing-tags :tagsCsv="$list->tag" />
            <div class="text-lg mt-4">
                <i class="fa-solid fa-location-dot"></i> {{$list->location}}
            </div>
        </div>
    </div>
</x-card>