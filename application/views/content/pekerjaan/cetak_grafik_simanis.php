<html>

<head>
	<title>Line Chart</title>
	<script src="https://www.chartjs.org/dist/2.9.3/Chart.min.js"></script>
    <script src="https://www.chartjs.org/samples/latest/utils.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.5.0/Chart.bundle.js"></script>

    <script src="https://cdn.jsdelivr.net/npm/chart.js@2.7.3/dist/Chart.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/chartjs-plugin-datalabels@0.7.0"></script>
    <script src="//ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js"></script>
	<style>
	canvas{
		-moz-user-select: none;
		-webkit-user-select: none;
		-ms-user-select: none;
	}
	</style>
</head>

<body>
	<div style="width:75%;">
		<canvas id="canvas"></canvas>
    </div>
    <!-- <?php json_encode($datarencanaa); ?>
    <?php json_encode($datarealisasia); ?>
    <?php json_encode($dataminggua); ?> -->

	<script>
        // var datarencana = ["0.506","1.755","3.899","7.854","13.63","19.497","26.97","34.97","43.97","53.97","64.97","76.97","85.97","87.97","89.97","91.97","93.97","95.97","97.97","100"];
        // var datarealisasi = ["1.73","0","0","0","0",null,null,null,null,null,null,null,null,null,null,null,null,null,null,null];
        // var dataminggu = [];
        var datarencana = [];
        var datarealisasi = [];
        var dataminggu = [];
    
        $.each(<?= json_encode($datarencanaa) ?>, function(test, item){
            if (item.bobot_total_acuan_komulatif == 0) {
			  	item.bobot_total_acuan_komulatif = null;
			}
            datarencana.push(item.bobot_total_acuan_komulatif);
        })
        $.each(<?= json_encode($datarealisasia) ?>, function(test, item){
        	if (item.bobot_total == 0) {
			  	item.bobot_total = null;
			}
            datarealisasi.push(item.bobot_total);
        })

        $.each(<?= json_encode($dataminggua) ?>, function(test, item){
            dataminggu.push(item.minggu);
        })
		// var MONTHS = ['January', 'February', 'March', 'April', 'May', 'June', 'July', 'August', 'September', 'October', 'November', 'December'];
		var config = {
			type: 'line',
			data: {
				// labels: ['minggu ke 1', 'minggu ke 2', 'minggu ke 3', 'minggu ke 4', 'minggu ke 5', 'minggu ke 6', 'minggu ke 7'],
                labels: dataminggu,
				datasets: [{
					label: 'Realisasi',
					fill: false,
					backgroundColor: window.chartColors.red,
					borderColor: window.chartColors.red,
					// data: [ 1,6,20,41,43,,],
                    data: datarealisasi,
                    datalabels: {
						align: 'end',
						anchor: 'end'
					}
				},{
					label: 'Rencana',
					backgroundColor: window.chartColors.blue,
					borderColor: window.chartColors.blue,
                    // data: [ 1,10,20,50,60,70,100 ],
                    data: datarencana,
					fill: false,
                    datalabels: {
						align: 'end',
						anchor: 'end'
					}
				}
				]
			},
			options: {
				responsive: true,
				title: {
					display: true,
					text: 'Grafik Jadwal Rencana dan Realisasi'
				},
				tooltips: {
					mode: 'index',
					intersect: false,
				},
				hover: {
					mode: 'nearest',
					intersect: true
				},
				scales: {
					xAxes: [{
						display: true,
						scaleLabel: {
							display: true,
							labelString: 'Minggu'
						}
					}],
                    
					yAxes: [{
						display: true,
						scaleLabel: {
							display: true,
							labelString: 'Bobot'
						}
					}]
				}
			}
		};

		window.onload = function() {
			var ctx = document.getElementById('canvas').getContext('2d');
			window.myLine = new Chart(ctx, config);
		};
    </script>

</body>

</html>
