<x-app-layout>
    <x-slot name="header">  
    <div class="container mt-3 mb-3">
        <div class="card material-card">
            <div class="card-header">
                <h1 class="text-center mt-3">{{ $material->title}}</h1>
                @can('delete', $material)
                <div class="text-center">
                    <a data-toggle="modal" data-target="#editMaterialModal" class="btn btn-primary"><i class="fas fa-edit"></i> Editar</a>
                    <a data-toggle="modal" data-target="#deleteMaterialModal" class="btn btn-danger"><i class="fas fa-trash-alt"></i> Excluir</a>
                </div>
                @endcan
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
                    <h3 class="text-md-left text-center">Adicionar comentário</h3>
                    <form action="{{ route('comment.store') }}" method="POST" id="comment-form">
                        @csrf
                        <div class="text-area">
                            <input type="hidden" name="post_id" value="{{ $material->id }}">
                            <textarea class="form-control resize-none mb-2" name="comment" id="comment" placeholder="Escreva seu comentário"></textarea>
                            <div class="text-md-right text-center">
                                <button type="submit" class="btn btn-primary mb-3">Comentar</button>
                            </div>
                        </div>
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
                        <h6>{{ $comment->user->name }} 
                            <span>
                                <small class="material-details mr-4 pr-3 float-right">{{ date('d/m/Y', strtotime($comment->created_at)) }}</small>
                            </span>
                        </h6>
                        <div>
                            <p id="{{ $comment->id }}">{{ $comment->comment }}</p>
                            @can('delete', $comment)
                                <div class="text-left">
                                    <a data-toggle="modal" data-target="#editCommentModal" class="btn btn-primary btn-sm" onclick="editComment({{ $comment->id }})"><i class="fas fa-edit"></i> Editar</a>
                                    <a data-toggle="modal" data-target="#deleteCommentModal" class="btn btn-danger btn-sm" onclick="deleteComment({{ $comment->id }})"><i class="fas fa-trash-alt"></i> Excluir</a>
                                </div>
                            @endcan
                        </div>
                    </div>
                @else
                    <div class="ml-3">
                        <h6>{{ $comment->user->name }}<span><small class="material-details mr-4 pr-3 float-right">{{ date('d/m/Y', strtotime($comment->created_at)) }}</small></span></h6>
                        <div>
                            <p>{{ $comment->comment }}</p>
                            @can('delete', $comment)
                                <div class="text-left">
                                    <a data-toggle="modal" data-target="#editCommentModal" class="btn btn-primary btn-sm" onclick="editComment({{ $comment->id }})"><i class="fas fa-edit"></i> Editar</a>
                                    <a data-toggle="modal" data-target="#deleteCommentModal" class="btn btn-danger btn-sm" onclick="deleteComment({{ $comment->id }})"><i class="fas fa-trash-alt"></i> Excluir</a>
                                </div>
                            @endcan
                        </div>
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
    <!-- Modal de excluir publicação -->
    <div class="modal fade" tabindex="-1" role="dialog" id="deleteMaterialModal">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Excluir material</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <p>Tem certeza que deseja excluir esse material? Essa ação não pode ser desfeita.</p>
                    <form action="{{ route('post.destroy', $material->id) }}" method="post" id="deleteForm">
                        @csrf
                        @method('delete')
                        <input type="hidden" name="id" value="{{ $material->id }}">
                    </form>
                </div>
                <div class="modal-footer">
                    <button type="submit" form="deleteForm" class="btn btn-danger">Excluir</button>
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Fechar</button>
                </div>
            </div>
        </div>
    </div>
    <!-- ---------------------------------------------------------------------------------------- -->
    <!-- Modal de editar a publicação -->
    <div class="modal fade" tabindex="-1" role="dialog" id="editMaterialModal">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Editar material</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form action="{{ route('post.update', $material->id) }}" method="post" id="editForm">
                        @csrf
                        @method('put')
                        <div class="form-group mt-3">
                            <label for="title">Título:<span class="required">*</span></label>
                            <input type="text" class="form-control" id="title" name="title" value="{{ old('title', $material->title) }}">
                        </div>
                        <div class="form-group  mt-3">
                            <label for="link">Link:<span class="required">*</span></label>
                            <input type="text" class="form-control " id="link" name="link" value="{{ old('link', $material->link) }}">
                        </div>
                        <div class="form-group  mt-3">
                            <label for="description">Descrição:<span class="required">*</span></label>
                            <textarea class="form-control resize-none" id="description" name="description">{{ old('description', $material->description) }}</textarea>
                        </div>
                    </form>
                </div>
                <div class="modal-footer">
                    <button type="submit" form="editForm" class="btn btn-primary">Salvar alterações</button>
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Fechar</button>
                </div>
            </div>
        </div>
    </div>
    <!-- ---------------------------------------------------------------------------------------- -->
    <!-- Modal de excluir comentário -->
    <div class="modal fade" tabindex="-1" role="dialog" id="deleteCommentModal">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Excluir comentário</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <p>Tem certeza que deseja excluir esse comentário? Essa ação não pode ser desfeita.</p>
                    <form method="post" id="deleteCommentForm">
                        @csrf
                        @method('delete')
                        <input type="hidden" name="commentId" id="commentId">
                    </form>
                </div>
                <div class="modal-footer">
                    <button type="submit" form="deleteCommentForm" class="btn btn-danger">Excluir</button>
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Fechar</button>
                </div>
            </div>
        </div>
    </div>
    <!-- ---------------------------------------------------------------------------------------- -->
    <!-- Modal de editar o comentario -->
    <div class="modal fade" tabindex="-1" role="dialog" id="editCommentModal">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Editar Comentário</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form method="post" id="editCommentForm">
                        @csrf
                        @method('put')
                        <div class="form-group mt-3">
                            <label for="title">Comentário:<span class="required">*</span></label>
                            <textarea class="resize-none col-sm-12" name="comment" id="editComment"></textarea>
                        </div>
                    </form>
                </div>
                <div class="modal-footer">
                    <button type="submit" form="editCommentForm" class="btn btn-primary">Salvar alterações</button>
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Fechar</button>
                </div>
            </div>
        </div>
    </div>
    @push('scripts')
        <script src="{{ asset('js/collapse.js') }}"></script>
        <script src="{{ asset('js/commentFunctions.js') }}"></script>
    @endpush
</x-app-layout>
