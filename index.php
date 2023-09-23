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
        <h5 class="card-header">Grafico con ChartJS</h5>
        <div class="card-body">
            <div>
                <div class="row">
                    <div class="col-lg-2">
                        <button class="btn btn-primary" onClick="CargarDatosGraficoBar()">Grafico</button>

                        <canvas id="myBarChart" width="400" height="400"></canvas>
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
        var data = {
            labels: ["January", "February", "March", "April", "May"],
            datasets: [
                {
                    label: "Monthly Sales",
                    backgroundColor: "rgba(75, 192, 192, 0.2)",
                    borderColor: "rgba(75, 192, 192, 1)",
                    borderWidth: 1,
                    data: [65, 59, 80, 81, 56]
                }
            ]
        };

        // Get the canvas element
        var ctx = document.getElementById("myBarChart").getContext("2d");

        // Create a new bar chart
        var myBarChart = new Chart(ctx, {
            type: 'bar',
            data: data,
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

        function CargarDatosGraficoBar(){
            $.ajax({
                url:'controler_graphic.php',
                type:'POST',
            }).done(function(resp){
                alert(resp);
            });
        }
    </script>
  </body>
</html>