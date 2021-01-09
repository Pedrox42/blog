<x-app-layout>
    <x-slot name="header"></x-slot>

    <div class="container mt-3">
        <div class="card material-card">
            <div class="card-header">
                <h1 class="text-center mt-3"><i class="fas fa-book-reader"></i> Bem vindo, Aluno!</h1>
            </div>
            <div class="ml-3 mt-5">
                <h4><a href="#" class="material"><i class="fas fa-book"></i>  Material 1</a><small class="material-details ml-2">Professor de Fisica</small><small class="material-details mr-4 pr-3 float-right">31/12/2020</small></h4>
                <p class="material-description mr-1">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Minus possimus impedit beatae voluptatum mollitia, ad ab eum fugit dolorum unde porro sequi ullam corporis doloribus vitae aliquid, praesentium laboriosam vero.</p>
            </div>
            <hr>
            <div class="ml-3 mt-3">
                <h4><a href="#" class="material"><i class="fas fa-book"></i>  Material 1</a><small class="material-details ml-2">Professor de Fisica</small><small class="material-details mr-4 pr-3 float-right">31/12/2020</small></h4>
                <p class="material-description mr-1">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Minus possimus impedit beatae voluptatum mollitia, ad ab eum fugit dolorum unde porro sequi ullam corporis doloribus vitae aliquid, praesentium laboriosam vero.</p>
            </div>
        </div>
    </div>
    @push('scripts')
        <script src="{{'js/collapse.js'}}"></script>
    @endpush
</x-app-layout>
