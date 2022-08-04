<x-app-layout>
    <div style="width: 50%">
        {!! $charts->container() !!}
    </div>
    <canvas id="myChart" width="400" height="400"></canvas>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <script>
        var labels = [];
        var dataSet = [];

        $.ajax({
            type: 'GET', //THIS NEEDS TO BE GET
            url: '/dataCharts',
            success: function (data) {
                var obj = JSON.parse(data);
                console.log(obj);

                // Creacion de la grafica.
                const ctx = document.getElementById('myChart').getContext('2d');
                const myChart = new Chart(ctx, {
                    type: 'doughnut',
                    data: {
                        labels: labels,
                        datasets: [{
                            label: '# of Votes',
                            data: [12, 19, 3, 5, 2, 3],
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
                            y: {
                                beginAtZero: true
                            }
                        }
                    }
                });

                //Obtener elemento de la grafica.
                const pdfChart = document.getElementById('myChart');

                //Pasarla a DataURl
                const imageChart = pdfChart.toDataURL();

                //Lo enviamos al controlador
                $.ajax({
                    type: 'POST',
                    url: 'exportImage',
                    data: imageChart,
                });
                // $.each(obj['getstamps'], function (key, val) {
                //     your_html += "<p>My Value :" +  val + ") </p>"
                // });
                // $("#data").append(you_html); //// For Append
                // $("#mydiv").html(your_html)   //// For replace with previous one
            },
            error: function() { 
                console.log(data);
            }
        });

        const ctx = document.getElementById('myChart').getContext('2d');
        const myChart = new Chart(ctx, {
            type: 'doughnut',
            data: {
                labels: labels,
                datasets: [{
                    label: '# of Votes',
                    data: [12, 19, 3, 5, 2, 3],
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
                    y: {
                        beginAtZero: true
                    }
                }
            }
        }); 

        const pdfChart = document.getElementById('myChart');
        const imageChart = pdfChart.toDataURL('image/jpg', 1.0);
        const valueChart = document.getElementById('charts_image').val(imageChart);
    </script>
</x-app-layout>