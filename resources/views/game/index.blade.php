<x-app-layout>
    <h1>Jogos da Forca</h1>

    <a href="{{ route('game.create') }}" class="btn btn-primary">Novo Jogo</a>

    <table class="table mt-3">
        <thead>
            <tr>
                <th>ID</th>
                <th>Status</th>
                <th>Tentativas</th>
                <th>Data de Criação</th>
                <th>Ações</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($games as $game)
                <tr>
                    <td>{{ $game->id }}</td>
                    <td>{{ $game->status }}</td>
                    <td>{{ $game->attempts }}</td>
                    <td>{{ $game->created_at }}</td>
                    <td>
                        <a href="{{ route('game.show', $game->id) }}" class="btn btn-info">Continuar</a>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
</x-app-layout>
