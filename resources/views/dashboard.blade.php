<x-app-layout>
    <x-slot name="header"></x-slot>

    <div class="container mt-3">
        <div class="card material-card">
            <div class="card-header">
                <h1 class="text-center mt-3">Bem vindo, Aluno!</h1>
            </div>
            <div class="ml-3 mt-5">
                <h5><a href="#" class="material"><i class="fas fa-book"></i>  Material 1</a></h5>
                <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Minus possimus impedit beatae voluptatum mollitia, ad ab eum fugit dolorum unde porro sequi ullam corporis doloribus vitae aliquid, praesentium laboriosam vero.</p>
            </div>
            <hr>
            <div class="ml-3 mt-3">
                <h5><a href="#" class="material"><i class="fas fa-book"></i>  Material 1</a></h5>
                <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Minus possimus impedit beatae voluptatum mollitia, ad ab eum fugit dolorum unde porro sequi ullam corporis doloribus vitae aliquid, praesentium laboriosam vero.</p>
            </div>
            <hr>
            <div class="ml-3 mt-3">
                <h5><a href="#" class="material"><i class="fas fa-book"></i>  Material 1</a></h5>
                <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Minus possimus impedit beatae voluptatum mollitia, ad ab eum fugit dolorum unde porro sequi ullam corporis doloribus vitae aliquid, praesentium laboriosam vero.</p>
            </div>
            <hr>
            <div class="ml-3 mt-3">
                <h5><a href="#" class="material"><i class="fas fa-book"></i>  Material 1</a></h5>
                <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Minus possimus impedit beatae voluptatum mollitia, ad ab eum fugit dolorum unde porro sequi ullam corporis doloribus vitae aliquid, praesentium laboriosam vero.</p>
            </div>
        </div>
    </div>
    @push('scripts')
        <script src="{{'js/collapse.js'}}"></script>
    @endpush
</x-app-layout>
