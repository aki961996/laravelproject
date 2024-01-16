<x-layout>

    <div class="bg-gray-50 border border-gray-200 p-10 rounded max-w-lg mx-auto mt-24">
        <header class="text-center">
            <h2 class="text-2xl font-bold uppercase mb-1">
                Edit a Gig
            </h2>
            <p class="mb-4">Edit : {{$listing->title}}</p>
        </header>

        <form action="/listings/{{ $listing->id }}" method="post" enctype="multipart/form-data">
            @csrf
            @method('PUT')
            <div class="mb-6">
                <label for="company" class="inline-block text-lg mb-2">Company Name</label>
                <input type="text" class="border border-gray-200 rounded p-2 w-full" value="{{$listing->company}}"
                    name="company" />
                {{-- errors --}}
                @error('company')
                <p class="text-red-500 text-xs mt-1">{{$message}}</p>
                @enderror
            </div>

            <div class="mb-6">
                <label for="title" class="inline-block text-lg mb-2">Job Title</label>
                <input type="text" class="border border-gray-200 rounded p-2 w-full" value="{{$listing->title}}"
                    name="title" placeholder="Example: Senior Laravel Developer" />
                {{-- errors --}}
                @error('title')
                <P class="text-red-500 text-xs mt-1">{{$message}}</P>
                @enderror
            </div>

            <div class="mb-6">
                <label for="location" class="inline-block text-lg mb-2">Job Location</label>
                <input type="text" class="border border-gray-200 rounded p-2 w-full" value="{{$listing->location}}"
                    name="location" placeholder="Example: Remote, Boston MA, etc" />
                @error('location')
                <p class="text-red-500 text-xs mt-1">{{$message}}</p>
                @enderror
            </div>

            <div class="mb-6">
                <label for="email" class="inline-block text-lg mb-2">Contact Email</label>
                <input type="text" class="border border-gray-200 rounded p-2 w-full" value="{{$listing->email}}"
                    name="email" />
                @error('email')
                <p class="text-red-500 text-xs mt-1">{{$message}}</p>
                @enderror
            </div>

            <div class="mb-6">
                <label for="website" class="inline-block text-lg mb-2">
                    Website/Application URL
                </label>
                <input type="text" class="border border-gray-200 rounded p-2 w-full" value="{{$listing->website}}"
                    name="website" />
                @error('website')

                <p class="text-red-500 text-xs mt-1">{{$message}}</p>

                @enderror
            </div>

            <div class="mb-6">
                <label for="tag" class="inline-block text-lg mb-2">
                    Tags (Comma Separated)
                </label>
                <input type="text" class="border border-gray-200 rounded p-2 w-full" value="{{$listing->tag}}"
                    name="tag" placeholder="Example: Laravel, Backend, Postgres, etc" />
                @error('tag')
                <p class="text-red-500 text-xs mt-1">{{$message}}</p>

                @enderror
            </div>

            <div class="mb-6">
                <img class="hidden w-48 mr-6 md:block"
                    src="{{$listing->logo ? asset('/storage/' . $listing->logo) : asset('/images/no-image.png')}}"
                    alt="" />
                <label for="logo" class="inline-block text-lg mb-2">
                    Company Logo
                </label>
                <input type="file" class="border border-gray-200 rounded p-2 w-full" name="logo" />
                @error('logo')
                <p class="text-red-500 text-xs mt-1">{{$message}}</p>
                @enderror
            </div>

            <div class="mb-6">
                <label for="description" class="inline-block text-lg mb-2">
                    Job Description
                </label>
                <textarea class="border border-gray-200 rounded p-2 w-full" value="{{$listing->description}}"
                    name="description" rows="10"
                    placeholder="Include tasks, requirements, salary, etc">{{$listing->description}}</textarea>
                @error('description')
                <p class="text-red-500 text-xs mt-1">{{$message}}</p>
                @enderror
            </div>

            <div class="mb-6">
                <button class="bg-laravel text-white rounded py-2 px-4 hover:bg-black">
                    Update Gig
                </button>

                <a href="/" class="text-black ml-4"> Back </a>
            </div>
        </form>
    </div>
</x-layout>