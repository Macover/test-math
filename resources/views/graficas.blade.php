@extends('layout_admin.mainAdmin')

@section('titulo')
    <title>VISTA ADMIN</title>
@endsection

@section('css')

@endsection

@section('titulo-pagina')
    <h1 class="h3 mb-4 text-danger">Gráficas</h1>
@endsection

@section('contenido')

    <!--* Grafica genero *-->
    <div class="card">
        <!-- Card header -->
        <div class="card-header">
            <!-- Title -->
            <h5 class="h3 mb-0">Gráfica genero</h5>
        </div>
        <!-- Card body -->
        <div class="card-body">
            <div class="chart">
                <!-- grafica genero -->
                <div class="row-cols-md-4">
                    <canvas id="myChart" width="400" height="400"></canvas>
                </div>
            </div>
        </div>
    </div>
    <!--* Grafica puntaje *-->
    <div class="card">
        <!-- Card header -->
        <div class="card-header">
            <!-- Title -->
            <h5 class="h3 mb-0">Gráfica puntaje</h5>
        </div>
        <!-- Card body -->
        <div class="card-body">
            <div class="chart">
                <!-- grafica genero -->
                <div class="row-cols-md-4">
                    <canvas id="myChart2" width="400" height="400"></canvas>
                </div>
            </div>
        </div>
    </div>
    <!--* Grafica edad *-->
    <div class="card">
        <!-- Card header -->
        <div class="card-header">
            <!-- Title -->
            <h5 class="h3 mb-0">Gráfica por edades</h5>
        </div>
        <!-- Card body -->
        <div class="card-body">
            <div class="chart">
                <!-- grafica genero -->
                <div class="row-cols-md-4">
                    <canvas id="myChart3" width="400" height="400"></canvas>
                </div>
            </div>
        </div>
    </div>



@endsection

@section('js')
    <script src="https://cdn.jsdelivr.net/npm/chart.js@2.9.4/dist/Chart.min.js"></script>
    <script>
        let genero=["Femenino","Masculino"];
        let numeroGenero=[3,5];
        let promediosPuntaje=[3,5];
        let edades=[1,2];
        let ids=[];

        $(document).ready(function(){
        console.log("asda");
            $.ajax({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
                type: "post",
                url: "{{route('graficas.re')}}",
                data: 2,
                success: function (data) {
                    let numeroHombres = 0;
                    let numeroMujeres = 0;
                    let puntajesHombre = 0;
                    let puntajesMujer = 0;
                    for (var i=0; i<data.length; i++){
                        if (data[i]["genero"] == "masculino"){
                            numeroHombres++;
                            puntajesHombre += data[i]["puntaje"];
                            edades[i] = data[i]["edad"];
                            ids[i] = data[i]["id_usuario"];
                        }
                        if (data[i]["genero"] == "femenino"){
                            numeroMujeres++;
                            puntajesMujer += data[i]["puntaje"];
                            edades[i] = data[i]["edad"];
                            ids[i] = data[i]["id_usuario"];
                        }
                    }
                    let promedioHombre = puntajesHombre / 5;
                    let promedioMujer = puntajesMujer / 5;

                    numeroGenero[0]=numeroMujeres;
                    numeroGenero[1]=numeroHombres;

                    promediosPuntaje[0]=promedioMujer;
                    promediosPuntaje[1]=promedioHombre;

                    console.log(edades);
                    graficaEdades();

                }

            });

            graficaGenero();
            graficaPuntaje();


            function graficaGenero(){
                var ctx = document.getElementById('myChart').getContext('2d');
                var myChart = new Chart(ctx, {
                    type: 'bar',
                    data: {
                        labels: genero,
                        datasets: [{
                            label: 'Numero de registros',
                            data: numeroGenero,
                            backgroundColor: [
                                'rgba(255, 99, 132, 0.2)',
                                'rgba(54, 162, 235, 0.2)',
                                'rgba(255, 206, 86, 0.2)',
                                'rgba(75, 192, 192, 0.2)',
                                'rgba(153, 102, 255, 0.2)',
                                'rgba(255, 159, 64, 0.2)'
                            ],
                            borderColor: [
                                'rgba(255, 99, 132, 1)',
                                'rgba(54, 162, 235, 1)',
                                'rgba(255, 206, 86, 1)',
                                'rgba(75, 192, 192, 1)',
                                'rgba(153, 102, 255, 1)',
                                'rgba(255, 159, 64, 1)'
                            ],
                            borderWidth: 1
                        }]
                    },
                    options: {
                        scales: {
                            yAxes: [{
                                ticks: {
                                    beginAtZero: true
                                }
                            }]
                        }
                    }
                });
            }
            function graficaPuntaje(){
                var ctx = document.getElementById('myChart2').getContext('2d');
                var myChart = new Chart(ctx, {
                    type: 'bar',
                    data: {
                        labels: genero,
                        datasets: [{
                            label: 'Promedio',
                            data: promediosPuntaje,
                            backgroundColor: [
                                'rgba(255, 99, 132, 0.2)',
                                'rgba(54, 162, 235, 0.2)',
                                'rgba(255, 206, 86, 0.2)',
                                'rgba(75, 192, 192, 0.2)',
                                'rgba(153, 102, 255, 0.2)',
                                'rgba(255, 159, 64, 0.2)'
                            ],
                            borderColor: [
                                'rgba(255, 99, 132, 1)',
                                'rgba(54, 162, 235, 1)',
                                'rgba(255, 206, 86, 1)',
                                'rgba(75, 192, 192, 1)',
                                'rgba(153, 102, 255, 1)',
                                'rgba(255, 159, 64, 1)'
                            ],
                            borderWidth: 1
                        }]
                    },
                    options: {
                        scales: {
                            yAxes: [{
                                ticks: {
                                    beginAtZero: true
                                }
                            }]
                        }
                    }
                });
            }
            function graficaEdades(){
                var ctx = document.getElementById('myChart3').getContext('2d');
                var myChart = new Chart(ctx, {
                    type: 'bar',
                    data: {
                        labels: ids,
                        datasets: [{
                            label: 'Edad',
                            data: edades,
                            backgroundColor: [
                                'rgba(255, 99, 132, 0.2)',
                                'rgba(54, 162, 235, 0.2)',
                                'rgba(255, 206, 86, 0.2)',
                                'rgba(75, 192, 192, 0.2)',
                                'rgba(153, 102, 255, 0.2)',
                                'rgba(255, 159, 64, 0.2)'
                            ],
                            borderColor: [
                                'rgba(255, 99, 132, 1)',
                                'rgba(54, 162, 235, 1)',
                                'rgba(255, 206, 86, 1)',
                                'rgba(75, 192, 192, 1)',
                                'rgba(153, 102, 255, 1)',
                                'rgba(255, 159, 64, 1)'
                            ],
                            borderWidth: 1
                        }]
                    },
                    options: {
                        scales: {
                            yAxes: [{
                                ticks: {
                                    beginAtZero: true
                                }
                            }]
                        }
                    }
                });
            }

        });

    </script>
@endsection

