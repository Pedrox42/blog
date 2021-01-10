<x-app-layout>
    <x-slot name="header"></x-slot>

    <div class="container mt-3 mb-3">
        <div class="card material-card">
            <div class="card-header">
                <h1 class="text-center mt-3"><i class="fas fa-book-reader"></i> Bem vindo, {{ Auth::user()->name}}</h1>
            </div>
            @foreach($posts as $post)
                <div class="ml-3 mr-2 mt-5">
                    <h4><a href="{{ route('material', $post->id) }}" class="material"><i class="fas fa-book"></i>  {{ $post->title }}</a><small class="material-details ml-2">{{ $post->user->name }}</small><small class="material-details mr-4 pr-3 float-right">{{ date('d/m/Y', strtotime($post->created_at)) }}</small></h4>
                    <p class="material-description mr-1">{{ $post->description }}</p>
                </div>
                <hr>
            @endforeach
            <div class="d-flex justify-content-center">
                {!! $posts->links() !!}
            </div>
        </div>
    </div>
    @push('scripts')
        <script src="{{'js/collapse.js'}}"></script>
    @endpush
</x-app-layout>
