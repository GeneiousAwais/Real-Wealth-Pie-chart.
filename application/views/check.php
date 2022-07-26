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
							<div class="mb-3">
								<div class="row">
									<div class="col-md-12">
										<?php
										$score = array();
										foreach ($questions_scores as $key => $questions_score) {


											array_push($score,$questions_score->score);
										}
										$score_data = implode(',',$score);
										?>

										<input type="hidden" name="scores" id="scores" value="<?= $score_data?>">
										<div class="container">
											<div id="chart" class="">
												<canvas id="myChart"></canvas>
											</div>
										</div>

									</div>
								</div>
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
		const labels =  ["Career","Finances","Possessions","Health & fitness","Fun & recreation","Personal Growth & Education","Friends","Family","Romance","Spirtual"];

		var data = {
			datasets: [{
				data: [
				arr[0],
				arr[1],
				arr[2],
				arr[3],
				arr[4],
				arr[5],
				arr[6],
				arr[7],
				arr[8],
				arr[9]
				],
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
			"Career "+arr[0],
			"Finances "+arr[1],
			"Possessions "+arr[2],
			"Health & fitness "+arr[3],
			"Fun & recreation "+arr[4],
			"Personal Growth & Education "+arr[5],
			"Friends "+arr[6],
			"Family "+arr[7],
			"Romance "+arr[8],
			"Spirtual "+arr[9]
			],
		};

		const config = {
			type: 'polarArea',
			data: data,
			options: {
				responsive: true,
				scales: {
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
				plugins: {
					legend: {
						position: 'bottom',
						display:false,
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
			},
		};
		var ctx = $("#myChart");
		ploarChart = new Chart(ctx, config);
	}


	function CreatePDFfromHTML() {
		var HTML_Width = $("#myChart").width();
		var HTML_Height = $("#myChart").height();
		var top_left_margin = 20;
		var PDF_Width = HTML_Width + (top_left_margin * 2);
		var PDF_Height = (PDF_Width * 1) + (top_left_margin * 1.5);
		var canvas_image_width = HTML_Width;
		var canvas_image_height = HTML_Height;

		var totalPDFPages = Math.ceil(HTML_Height / PDF_Height) - 1;

		html2canvas($("#myChart")[0]).then(function (canvas) {
			var imgData = canvas.toDataURL("image/jpeg", 1.0);
			var pdf = new jsPDF('p', 'pt', [PDF_Width, PDF_Height]);
			
            pdf.addImage(imgData, 'JPG', top_left_margin, top_left_margin, canvas_image_width, canvas_image_height);

            // pdf.text(50, 40, "Header");
			
			for (var i = 1; i <= totalPDFPages; i++) { 
				pdf.addPage(PDF_Width, PDF_Height);
				pdf.addImage(imgData, 'JPG', top_left_margin, -(PDF_Height*i)+(top_left_margin*4),canvas_image_width,canvas_image_height);
			}
			pdf.save("life_wheel.pdf");
			$("#myChart").show();
		});
	}


</script>
</body>
</html>

