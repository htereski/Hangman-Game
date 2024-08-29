<x-app-layout>
    <div class="alert alert-{{ $type }}">
        <h4>{{ $titulo }}</h4>
        <p>{{ $message }}</p>
        <a href="{{ route($link) }}" class="btn btn-primary">Voltar</a>
    </div>
</x-app-layout>
