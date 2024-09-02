<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
    <script type="text/javascript" src="{{ asset('js/google-chart-loader.js') }}"></script>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css">
    <title>Gráfico Jogo</title>
</head>

<body>
    @if (isset($message))
        <h2>{{ $message }}</h2>
    @else
        <div class="row">
            <div class="col text-center" id="pizza" style="width: 420px; height: 280px;"></div>
        </div>
    @endif

    <script type="text/javascript">
        var data_graph = <?php echo $data; ?>;

        var user = <?php echo $name; ?>;

        google.charts.load('current', {
            'packages': ['corechart']
        })
        google.charts.setOnLoadCallback(drawChart);

        function drawChart() {
            let data = google.visualization.arrayToDataTable(data_graph);

            options = {
                title: `Total de partidas de ${user}`,
                is3D: true
            };

            chart = new google.visualization.PieChart(document.getElementById('pizza'));
            chart.draw(data, options);
        }
    </script>
</body>

</html>
