<x-app-layout>
    <x-slot name="header">  
    <div class="container mt-3 mb-3">
        <div class="card material-card">
            <div class="card-header">
                <h1 class="text-center mt-3">Meu Perfil</h1>
            </div>
            <div>
                @if(Route::is('user.edit'))
                    <form method="POST" action="{{ route('user.update', $user->id) }}">
                    @csrf
                    @method('put')
                @endif
                    <!-- Nome -->
                    <div class="mt-4 row d-flex justify-content-center">
                        <div class="col-sm-4">
                            <label for="name">Nome:
                                @if(Route::is('user.edit'))
                                    <span class="required">*</span>
                                @endif
                            </label>
                            <input id="name" 
                                class="form-control w-100" 
                                type="text" 
                                name="name" value="{{ old('name', $user->name) }}" 
                                {{ Route::is('user.edit') ? 'required autofocus' : 'disabled' }}
                            >
                        </div>
                        <div class="col-sm-4">
                            <label for="email">Email:
                                @if(Route::is('user.edit'))
                                    <span class="required">*</span>
                                @endif
                            </label>
                            <input id="email" 
                                class="form-control w-100" 
                                type="email" 
                                name="email" value="{{ old('email', $user->email) }}" 
                                {{ Route::is('user.edit') ? 'required' : 'disabled' }}
                            >
                        </div>
                    </div> 
                    <!-- Senha -->
                    @if(Route::is('user.edit'))
                        <div class="mt-4 row d-flex justify-content-center">
                            <div class="col-sm-4">
                                <label for="password">Senha:<span class="required">*</span></label>
                                <input id="password" class="form-control w-100"
                                    type="password"
                                    name="password"
                                    required autocomplete="new-password" 
                                >
                            </div>
                            <div class="col-sm-4">
                                <label for="password_confirmation">Confirmar Senha<span class="required">*</span></label>
                                <input id="password_confirmation" class="form-control w-100"
                                    type="password"
                                    name="password_confirmation" 
                                    required 
                                >
                            </div>
                        </div>
                    @endif
                    <!-- Função -->
                    <div class="mt-4 row d-flex justify-content-center">
                        <div class="col-sm-4">
                            <label for="function">Função:
                                @if(Route::is('user.edit'))
                                    <span class="required">*</span>
                                @endif
                            </label>
                            <select id="function" class="form-control w-100 select2"
                                type="text"
                                name="function"
                                value="{{ old('function', $user->function) }}"
                                {{ Route::is('user.edit') ? 'required' : 'disabled' }}
                            >
                                @if($user->function == 1)
                                    <option value="1">Professor</option>
                                    <option value="0">Aluno</option>
                                @else
                                    <option value="0">Aluno</option>
                                    <option value="1">Professor</option>
                                @endif
                            </select>
                        </div>
                        <!-- Matricula -->
                        <div class="col-sm-4">
                            <label for="enrollment">Matrícula:
                                @if(Route::is('user.edit'))
                                    <span class="required">*</span>
                                @endif
                            </label>
                            <input id="enrollment" class="form-control w-100"
                                type="text"
                                name="enrollment" 
                                value="{{ old('enrollment', $user->enrollment) }}"
                                {{ Route::is('user.edit') ? 'required' : 'disabled' }} 
                            >
                        </div>
                        <div class="col-sm-12 d-flex justify-content-center row">
                            <x-auth-validation-errors :errors="$errors" />
                        </div>
                    </div>
                    <div class="text-center mt-3 mb-3">
                    @if(Route::is('user.edit'))
                            <a href="{{ route('user.show', $user->id) }}" class="mr-3 btn btn-dark"><i class="fas fa-undo-alt"></i> Voltar</a>
                            <button type="submit" class="btn btn-primary"><i class="fas fa-check"></i> Salvar alterações</button>
                        </form>
                    @else
                        <a href="{{ route('user.edit', $user->id)}}" class="mr-2 btn btn-primary"><i class="fas fa-edit"></i> Editar</a>
                        <a data-toggle="modal" data-target="#deleteUserModal" class="btn btn-danger"><i class="fas fa-trash-alt"></i> Excluir</a>
                    @endif
                </div>
            </div>
        </div>
    </div>
    <div class="modal fade" tabindex="-1" role="dialog" id="deleteUserModal">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Excluir usuário</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <p>Tem certeza que deseja excluir sua conta? Essa ação não pode ser desfeita.</p>
                <form action="{{ route('user.destroy', $user->id) }}" method="post" id="deleteForm">
                    @csrf
                    @method('delete')
                    <input type="hidden" name="id" value="{{ $user->id }}">
                </form>
            </div>
            <div class="modal-footer">
                <button type="submit" form="deleteForm" class="btn btn-danger">Excluir</button>
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Fechar</button>
            </div>
            </div>
        </div>
        @push('scripts')
            <script src="{{ asset('js/collapse.js') }}"></script>
        @endpush
    </x-app-layout>