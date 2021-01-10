<x-app-layout>
    <x-slot name="header">  
    <div class="container mt-3 mb-3">
        <div class="card material-card">
            <div class="card-header">
                <h1 class="text-center mt-3">{{ $material->title}}</h1>
            </div>
            <div class="d-flex justify-content-center ml-3 mr-2 mt-5">
                <iframe width="560" height="315" src="{{ $material->link }}" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
            </div>
            <div class="mt-5 ml-3">
                <h4 class="text-center"><i class="fas fa-user-tie"></i> {{ $material->user->name }}</h4>
                <p class="material-description mr-1">{{ $material->description }}</p>
            </div>
            <hr>
            @if(Auth::user()->function == 0)
                <div class="ml-3">
                    <h3>Adicionar comentário</h3>
                    <form action="{{ route('comment.store') }}" method="POST" id="comment-form">
                        @csrf
                        <input type="hidden" name="post_id" value="{{ $material->id }}">
                        <textarea class="form-control text-area mb-2" name="comment" id="comment" placeholder="Escreva seu comentário"></textarea>
                        <button type="submit" class="btn btn-primary mb-3 float-right mr-5">Comentar</button>
                    </form>
                </div>
                <hr>
            @endif
            <h4 class="mb-3 ml-3">Comentários</h4>
            @forelse($comments as $comment)
                @php
                    $i++;
                @endphp
                @if($i == $lastComment)
                    <div class="ml-3 mb-4">
                        <h6>{{ $comment->user->name }}<span><small class="material-details mr-4 pr-3 float-right">{{ date('d/m/Y', strtotime($comment->created_at)) }}</small></span></h6>
                        <p>{{ $comment->comment }}</p>
                    </div>
                @else
                    <div class="ml-3">
                        <h6>{{ $comment->user->name }}<span><small class="material-details mr-4 pr-3 float-right">{{ date('d/m/Y', strtotime($comment->created_at)) }}</small></span></h6>
                        <p>{{ $comment->comment }}</p>
                    </div>
                    <hr>
                @endif
            @empty
                <div class="ml-3 mb-4 text-center">
                    <p class="font-italic no-comments">Nenhum comentário até o momento. Seja o primeiro a comentar!</p>
                </div>
            @endforelse
        </div>
    </div>
    <script src="{{ asset('js/collapse.js') }}"></script>
</x-app-layout>
