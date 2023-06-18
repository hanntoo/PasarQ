<x-app-layout>
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    Favorite Page!
                </div>
                <div class="row">
                    @foreach($favorites as $item)
                        @include('components.favorite-card', ['item' => $item])
                    @endforeach
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
