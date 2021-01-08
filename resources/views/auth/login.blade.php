<x-guest-layout>
    <div class="container col-sm-4">
        <div class="text-center">
            <img class="img-fluid mt-3" src="{{asset('img/colegio.png')}}" alt="Logo do colégio" width="300px" height="300px">
        </div>

        <form method="POST" action="{{ route('login') }}" class="text-center">
            @csrf

            <!-- Email Address -->
            <div class="mt-4 text-left">
                <input id="email" class="form-control w-100"
                    name="email" 
                    type="email" 
                    value="{{ old('email') }}" 
                    placeholder="Email" 
                    required 
                    autofocus
                >
            </div>
            <!-- Password -->
            <div class="mt-4">
                <input id="password" class="form-control"
                    placeholder="Senha"
                    type="password"
                    name="password"
                    required
                >
            </div>
            <x-auth-validation-errors class="mb-4" :errors="$errors" />
            <div class="block mt-4">
                <label for="remember_me" class="d-flex d-left">
                    <input id="remember_me" type="checkbox" class="mt-1" name="remember">
                    <span class="ml-1">Mantenha-me conectado</span>
                </label>
            </div>
                <div class="text-center">
                    <button type="submit" class="my-3 btn btn-primary btn-block">Entrar</button>
                    <a href="{{ route('register') }}" class="my-3">Registrar</a>
                </div>
            </div>
        </form>
    </div>
</x-guest-layout>
