<x-layout>
    @include('partials/_hero')
    {{--
    <h1>Listing
        {{$heading}}
    </h1> --}}
    {{-- this is one exmple --}}
    {{-- @if(count($listings) == 0)
    <p>No Listing Found</p>
    @endif --}}
    {{-- second example with unless --}}
    @include('partials/_search')

    <div class="lg:grid lg:grid-cols-2 gap-4 space-y-4 md:space-y-0 mx-4">
        @unless (count($listings) == 0)
        @foreach ($listings as $list)
        <x-listing-card :list="$list" />
        @endforeach
        @else
        <p>No Listing Found</p>
        @endunless


    </div>

    <div class="mt-6 p-4 ">
        {!! $listings->links() !!}
    </div>
</x-layout>