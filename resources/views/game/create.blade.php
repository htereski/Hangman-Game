<x-app-layout>
    <h1>Novo Jogo da Forca</h1>

    
    <form action="{{ route('game.store') }}" method="post">
        @csrf
        <button type="submit" class="btn btn-primary">Iniciar Novo Jogo</button>
    </form>
</x-app-layout>
