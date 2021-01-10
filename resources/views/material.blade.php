<x-app-layout>
    <x-slot name="header"></x-slot>

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
            <div class="ml-3">
                <h3>Adicionar comentário</h3>
                <form action="" method="POST">
                    <textarea class="form-control comment-area mb-2" name="comment" id="comment" placeholder="Escreva seu comentário"></textarea>
                    <button type="submit" class="btn btn-primary mb-3 float-right mr-5">Comentar</button>
                </form>
            </div>
            <hr>
            <h4 class="mb-3 ml-3">Comentários</h4>
            @foreach($comments as $comment)
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
            @endforeach
        </div>
    </div>
    @push('scripts')
        <script src="{{'js/collapse.js'}}"></script>
    @endpush
</x-app-layout>
