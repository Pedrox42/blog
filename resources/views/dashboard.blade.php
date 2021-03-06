<x-app-layout>
    <x-slot name="header"></x-slot>

    <div class="container mt-3 mb-3">
        <div class="card material-card">
            <div class="card-header">
                <div class="row">
                    <div class="col-sm-12 text-center">
                        <h1 class="mt-3"><i class="fas fa-book-reader"></i> Bem vindo, {{ Auth::user()->function == 1 ? 'Prof. ' : '' }}{{ Auth::user()->name}}</h1>
                    </div>
                    @if(Auth::user()->function == 1)
                    <div class="col-sm-12 mt-1 text-center">
                        <button class="btn btn-dark rounded-pill" data-toggle="modal" data-target="#addModal"><i class="fas fa-plus"></i> Adicionar</button>
                    </div>
                    @endif
                    <div class="col-sm-12 text-center">
                        <x-auth-validation-errors :errors="$errors" />
                    </div>
                </div>
            </div>
            
            @forelse($posts as $post)
                @php
                if(isset($i)){
                    $i++;
                }
                @endphp
                @if($i == $lastPost)
                    <div class="ml-3 mr-2 mt-5 mb-5">
                        <div class="row">
                            <div class="col-sm-10">
                                <h4>
                                    <a href="{{ route('post.show', $post) }}" class="material"><i class="fas fa-book"></i>  {{ $post->title }}</a>
                                    <span>
                                        <small class="material-details ml-2">Prof. {{ $post->user->name }}</small>
                                    </span>
                                </h4>
                            </div>
                            <div class="col-sm-2 float-right">
                                <small class="material-details mr-4 pr-3">{{ date('d/m/Y', strtotime($post->created_at)) }}</small>
                            </div>
                        </div>
                        <div>
                            <p class="material-description mr-1">{{ $post->description }}</p>
                        </div>
                    </div>    
                @else
                    <div class="ml-3 mr-2 mt-5 mb-5">
                        <div class="row">
                            <div class="col-sm-10">
                                <h4>
                                    <a href="{{ route('post.show', $post) }}" class="material"><i class="fas fa-book"></i>  {{ $post->title }}</a>
                                    <span>
                                        <small class="material-details ml-2">Prof. {{ $post->user->name }}</small>
                                    </span>
                                </h4>
                            </div>
                            <div class="col-sm-2 float-right">
                                <small class="material-details mr-4 pr-3">{{ date('d/m/Y', strtotime($post->created_at)) }}</small>
                            </div>
                        </div>
                        <div>
                            <p class="material-description mr-1">{{ $post->description }}</p>
                        </div>
                    </div>
                    <hr>
                @endif
            @empty
                <div class="ml-3 mr-2 mt-5 mb-5 text-center">
                    <h1 class="font-italic text-secondary">Nenhum material postado até o momento!</h1>
                </div>
            @endforelse
            <div class="d-flex justify-content-center">
                {!! $posts->links() !!}
            </div>
        </div>
        <!-- Modal para adicionar material -->
        <div class="modal fade" tabindex="-1" id="addModal" role="dialog">
            <div class="modal-dialog" role="document">
              <div class="modal-content">
                <div class="modal-header">
                  <h5 class="modal-title">Adicionar Material</h5>
                  <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                  </button>
                </div>
                <div class="modal-body">
                    <form action="{{ route('post.store') }}" method="POST" id="addMaterial">
                        @csrf
                        <div class="form-group mt-3">
                            <label for="title">Título:<span class="required">*</span></label>
                            <input type="text" class="form-control" id="title" name="title">
                        </div>
                        <div class="form-group  mt-3">
                            <label for="link">Link:<span class="required">*</span></label>
                            <input type="text" class="form-control " id="link" name="link">
                        </div>
                        <div class="form-group  mt-3">
                            <label for="description">Descrição:<span class="required">*</span></label>
                            <textarea class="form-control resize-none" id="description" name="description"></textarea>
                        </div>
                    </form>
                </div>
                <div class="modal-footer">
                  <button type="submit" form="addMaterial" class="btn btn-primary">Adicionar</button>
                  <button type="button" class="btn btn-secondary" data-dismiss="modal">Fechar</button>
                </div>
              </div>
            </div>
          </div>
    </div>
    @push('scripts')
        <script src="{{'js/collapse.js'}}"></script>
    @endpush
</x-app-layout>
