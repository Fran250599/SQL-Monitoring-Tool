<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css" integrity="sha384-xOolHFLEh07PJGoPkLv1IbcEPTNtaed2xpHsD9ESMhqIYd0nLMwNLD69Npy4HI+N" crossorigin="anonymous">

    <title>Grafico</title>
  </head>
  <body>
    <h1>SQL monitoring tool</h1>
    <!-- Option 2: Separate Popper and Bootstrap JS -->

    <div class="card">
        <h5 class="card-header">Grafico barras con ChartJS</h5>
        <div class="card-body">
            <div>
                <div class="row">
                    <div class="col-lg-2">
                        <button class="btn btn-primary" onClick="CargarDatosGraficoBar()">Actualizar graficos</button>

                        <canvas id="myBarChart" width="800" height="800"></canvas>

                    </div>
                </div>
            </div>
           
        </div>
    </div>

    <div class="card">
        <h5 class="card-header">Grafico lineas con ChartJS</h5>
        <div class="card-body">
            <div>
                <div class="row">
                    <div class="col-lg-2">
                        <button class="btn btn-primary" onClick="CargarLineChart()">Actualizar grafico lineas</button>

                        <canvas id="myLineChart" width="800" height="800"></canvas>

                    </div>
                </div>
            </div>
           
        </div>
    </div>



    <script src="https://cdn.jsdelivr.net/npm/jquery@3.5.1/dist/jquery.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.min.js" integrity="sha384-+sLIOodYLS7CIrQpBjl+C7nPvqq+FbNUBDunl/OZv93DB7Ln/533i8e/mZXLi/P+" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/3.7.0/chart.min.js"></script>
 <script>
        // Sample data for the bar chart
       

        function CargarDatosGraficoBar(){
            $.ajax({
                url:'controler_graphic.php',
                type:'POST',
            }).done(function(resp){
                var data = JSON.parse(resp);

                var titles = [];
                var values = [];

                for (var i = 0; i < data.length; i++) {
                    titles.push(data[i][1]);
                    values.push(data[i][2]);
                }
                var data = {
                    labels: titles,
                    datasets: [
                        {
                            label: "Productos",
                            backgroundColor: "rgba(75, 192, 192, 0.2)",
                            borderColor: "rgba(75, 192, 192, 1)",
                            borderWidth: 1,
                            data: values
                        }
                    ]
                };

                // Get the canvas element
                var ctx = document.getElementById("myBarChart").getContext("2d");

                // Create a new bar chart
                var myBarChart = new Chart(ctx, 
                // Given the previous data, please create an horizontal
                // bar chart
                {
                    type: "bar",
                    data: data,
                    options: {
                        indexAxis: "y",
                        scales: {
                            yAxes: [
                                {
                                    ticks: {
                                        beginAtZero: true
                                    }
                                }
                            ]
                        }
                    }
                }
                
                );
            });
        }

        function CargarLineChart(){
            //dummy data for a line chart
            var data = {
                labels: ["January", "February", "March", "April", "May", "June", "July"],
                datasets: [
                    {
                        label: "Uso de la base de datos",
                        fill: false,
                        lineTension: 0.1,
                        backgroundColor: "rgba(75, 192, 192, 0.4)",
                        borderColor: "rgba(75, 192, 192, 1)",
                        borderCapStyle: "butt",
                        borderDash: [],
                        borderDashOffset: 0.0,
                        borderJoinStyle: "miter",
                        pointBorderColor: "rgba(75, 192, 192, 1)",
                        pointBackgroundColor: "#fff",
                        pointBorderWidth: 1,
                        pointHoverRadius: 5,
                        pointHoverBackgroundColor: "rgba(75, 192, 192, 1)",
                        pointHoverBorderColor: "rgba(220, 220, 220, 1)",
                        pointHoverBorderWidth: 2,
                        pointRadius: 1,
                        pointHitRadius: 10,
                        data: [65, 59, 80, 81, 56, 55, 40]
                    }
                ]
            };

            // Get the canvas element
            var ctx = document.getElementById("myLineChart").getContext("2d");

            // Create a new line chart
            var myLineChart = new Chart(ctx, {
                type: "line",
                data: data,
                options: {
                    scales: {
                        yAxes: [
                            {
                                ticks: {
                                    beginAtZero: true
                                }
                            }
                        ]
                    }
                }
            });
        }
    </script>
  </body>
</html>