<x-guest-layout>
    <div class="container mb-3">
        <div class="text-center">
            <img class="img-fluid mt-3" src="{{asset('img/colegio.png')}}" alt="Logo do colégio" width="300px" height="300px">
        </div>
        <form method="POST" action="{{ route('register') }}">
            @csrf

            <!-- Nome -->
            <div class="mt-4 row d-flex justify-content-center">
                <div class="col-sm-4">
                    <label for="name">Nome<span class="required">*</span></label>
                    <input id="name" 
                        class="form-control w-100" 
                        type="text" 
                        name="name" value="{{ old('name') }}" 
                        required autofocus
                    >
                </div>
                <div class="col-sm-4">
                    <label for="email">Email<span class="required">*</span></label>
                    <input id="email" 
                        class="form-control w-100" 
                        type="email" 
                        name="email" value="{{ old('email') }}" 
                        required
                    >
                </div>
            </div> 
            <!-- Senha -->
            <div class="mt-4 row d-flex justify-content-center">
                <div class="col-sm-4">
                    <label for="password">Senha<span class="required">*</span></label>
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
                        name="password_confirmation" required 
                    >
                </div>
            </div>
            <!-- Função -->
            <div class="mt-4 row d-flex justify-content-center">
                <div class="col-sm-4">
                    <label for="function">Função<span class="required">*</span></label>
                    <select id="function" class="form-control w-100"
                        type="text"
                        name="function"
                        value="{{ old('function') }}"
                        required
                    >
                        <option value="0">Aluno</option>
                        <option value="1">Professor</option>
                    </select>
                </div>
                <div class="col-sm-4">
                    <label for="enrollment">Matrícula<span class="required">*</span></label>
                    <input id="enrollment" class="form-control w-100"
                        type="text"
                        name="enrollment" required 
                    >
                </div>
                <div class="col-sm-12 d-flex justify-content-center row">
                    <x-auth-validation-errors :errors="$errors" />
                </div>
            </div>
            <div class="text-center">
                <button type="submit" class="my-3 btn btn-primary w-50">Registrar</button><br>
                <a href="{{ route('login') }}" class="mb-3">Entrar</a>
            </div>
        </form>
    </div>
</x-guest-layout>
