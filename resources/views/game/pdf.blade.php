@php
    $wins = 0;
    $defeat = 0;
    $playing = 0;
    foreach ($data as $item) {
        if ($item->status === 'GANHOU') {
            $wins++;
        }
        elseif ($item->status === 'PERDEU') {
            $defeat++;
        }
        else {
            $playing++;
        }
    }
@endphp

<h1>Relátorio de jogos de {{ Auth::user()->name }}</h1>
<hr>
<h2>Vitorias: {{ $wins }}</h2>
<h2>Derrotas: {{ $defeat }}</h2>
<h2>Em partida: {{ $playing }}</h2>
