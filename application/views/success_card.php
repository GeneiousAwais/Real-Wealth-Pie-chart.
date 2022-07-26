<?php include('header.php') ?>
<div class="main-content">
	<div class="page-content">
		<div class="container-fluid">

			<div class="row">
				<div class="col-sm-12">
					<div class="card">
						<div class="card-body">
							<div class="row">
								<div class="col-sm-11">
									<h4 class="card-title">Life Wheel results for <?= $info['first_name']?> (<?= date("d M Y")?>)  </h4>
								</div>
								<div class="col-sm-1">
									<a href="javascript:void(0);" class="btn btn-sm btn-outline-danger waves-effect export-pdf"><i class="mdi mdi-file-pdf"></i>&nbsp;Save as PDF</a>
								</div>	
							</div>																
						</div>
					</div>
				</div>
			</div>

			<div class="row">
				<div class="col-md-12">
					<div class="card">
						<div class="card-body">
							<?php
							$score = array();
							foreach ($questions_scores as $key => $questions_score) {


								array_push($score,$questions_score->score);
							}
							$score_data = implode(',',$score);
							?>

							<input type="hidden" name="scores" id="scores" value="<?= $score_data?>">
							<div id="chart" class="">
								<canvas id="myChart_<?= time();?>" width="1200" height="1000" class="myChart"></canvas>
							</div>
						</div>
					</div>
				</div>						
			</div>
		</div>
	</div>
</div>
<?php include('footer_script.php') ?>


<script>
let card_title = $('.card-title').html();
let graph_id = $('.myChart').attr('id');

	let ctx = document.getElementById(graph_id).getContext("2d");
		data = {
			datasets: [{
				data: [0,0,0,0,0,0,0,0,0,0],
				backgroundColor: [
				"#5470c6",
				"#91cc75",
				"#fac858",
				"#ee6666",
				"#73c0de",
				"#3ba272",
				"#fc8452",
				"#9a60b4",
				"#e3ceed",
				'#ced4da'

				]
			}],
			labels: [
			"Career",
			"Finances",
			"Possessions",
			"Health & fitness",
			"Fun & recreation",
			"Personal Growth & Education",
			"Friends",
			"Family",
			"Romance",
			"Spirtual"
			],
		};
		var myPolarAreaChart = new Chart(ctx, {
			data: data,
			type: 'polarArea',
			options: {
				responsive: true,
				scale: {
					ticks: {
						min: 0,
						max: 10,
						z: 99,
						stepSize: 1
					},
					r: {
						pointLabels: {
							display: true,
							centerPointLabels: true,
							font: {
								family: "'Raleway', 'Helvetica Neue', 'Helvetica', 'Arial', sans-serif",
								size: 13,
								weight: 600
							},
							color:'#000000'
						}
					}

				},
					legend: {
						position: 'bottom',
						display:true,
					},
					title: {
						display: true,
						text: card_title,
						font: {
							family: "'Raleway', 'Helvetica Neue', 'Helvetica', 'Arial', sans-serif",
							size: 15,
							weight: 600
						},
						color:'#000000'
					}	
			}
		});
	
	
	var doc = new jsPDF();          
	var elementHandler = {
		'#ignorePDF': function (element, renderer) {
			return true;
		}
	};


	$( document ).ready(function() {
		createChart();
	});

	$(document).on('click','.export-pdf' , function(){
		CreatePDFfromHTML();
	});

	function createChart() {

		var scores_data = $('#scores').val();
		var arr = scores_data.split(',');

		$.each(arr , function(index, val) { 
			console.log(index,val);
			myPolarAreaChart.data.datasets[0].data[index] =val;
			myPolarAreaChart.update();
		});
		myPolarAreaChart.data.labels = [
			"Career "+ arr[0],
			"Finances "+ arr[1],
			"Possessions "+ arr[2],
			"Health & fitness "+ arr[3],
			"Fun & recreation "+ arr[4],
			"Personal Growth & Education "+ arr[5],
			"Friends "+ arr[6],
			"Family "+ arr[7],
			"Romance "+ arr[8],
			"Spirtual "+ arr[9]
			];
		myPolarAreaChart.update();
	}


	function CreatePDFfromHTML() {
		var HTML_Width = $("#"+graph_id).width();
		var HTML_Height = $("#"+graph_id).height();
		var top_left_margin = 20;
		var PDF_Width = HTML_Width + (top_left_margin * 2);
		var PDF_Height = (PDF_Width * 1) + (top_left_margin * 1.5);
		var canvas_image_width = HTML_Width;
		var canvas_image_height = HTML_Height;

		var totalPDFPages = Math.ceil(HTML_Height / PDF_Height) - 1;

		html2canvas($("#"+graph_id)[0]).then(function (canvas) {
			var imgData = canvas.toDataURL("image/jpeg", 1.0);
			var pdf = new jsPDF('p', 'pt', [PDF_Width, PDF_Height]);
			
			pdf.addImage(imgData, 'JPG', top_left_margin, top_left_margin, canvas_image_width, canvas_image_height);

            // pdf.text(50, 40, "Header");

            for (var i = 1; i <= totalPDFPages; i++) { 
            	pdf.addPage(PDF_Width, PDF_Height);
            	pdf.addImage(imgData, 'JPG', top_left_margin, -(PDF_Height*i)+(top_left_margin*4),canvas_image_width,canvas_image_height);
            }
            pdf.save(card_title+".pdf");
            $("#"+graph_id).show();
        });
	}


</script>
</body>
</html>

