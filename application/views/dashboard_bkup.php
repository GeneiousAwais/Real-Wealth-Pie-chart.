 <?php include('header.php') ?>
 <div class="main-content">
 	<div class="page-content">
 		<div class="container-fluid">
 			<form method="POST" id="questionnaireForm" action="<?= base_url('save-questionnaire');?>" class="needs-validation" novalidate>
 				<?php if(isset($questions)){?>
 					<div class="row main_div mt-5">
 						<div class="offset-xl-3 col-xl-6 mt-5">
 							<?php 
 							foreach ($questions as $key => $question) {?>
 								<div class="card question-card <?= $key == 0 ? '' : 'd-none'?>" id="card_id_<?= $question->id?>">

											<!-- <div class="card-body color-box bg-dark bg-soft">
												<div class="row">
													<div class="col-sm-12 text-center">
														<div>
															<h4><?= $question->id?>/10</h4>
														</div>
													</div>
												</div>
											</div> -->

											<div class="card-body border-top">
												<div class="row">
													<div class="col-sm-12">
														<div class="p-4 text-center">
															<h5 class="font-size-15 mb-3">
																<strong class="font-size-17 mb-3"><?= ucfirst($question->question)?>
															</strong>
															<br />
															How would you rate this area of your life?
														</h5>

														<div data-current="<?= $question->id?>" class="area rating-star" id="q<?= $question->id?>box_1" data-option="1">1</div>
														<div data-current="<?= $question->id?>" class="area rating-star" id="q<?= $question->id?>box_2" data-option="2">2</div>
														<div data-current="<?= $question->id?>" class="area rating-star" id="q<?= $question->id?>box_3" data-option="3">3</div>
														<div data-current="<?= $question->id?>" class="area rating-star" id="q<?= $question->id?>box_4" data-option="4">4</div>
														<div data-current="<?= $question->id?>" class="area rating-star" id="q<?= $question->id?>box_5" data-option="5">5</div>
														<div data-current="<?= $question->id?>" class="area rating-star" id="q<?= $question->id?>box_6" data-option="6">6</div>
														<div data-current="<?= $question->id?>" class="area rating-star" id="q<?= $question->id?>box_7" data-option="7">7</div>
														<div data-current="<?= $question->id?>" class="area rating-star" id="q<?= $question->id?>box_8" data-option="8">8</div>
														<div data-current="<?= $question->id?>" class="area rating-star" id="q<?= $question->id?>box_9" data-option="9">9</div>
														<div data-current="<?= $question->id?>" class="area rating-star" id="q<?= $question->id?>box_10" data-option="10">10</div>

														<input name="score[<?= $question->id?>]" id="score_id_<?= $question->id?>" type="hidden" value ="">

													</div>
												</div>
											</div>
										</div>

										<div class="card-footer color-box g-soft border-top" style="background: #8aaecc;">

											<button type="button" class="btn btn-light btn-rounded waves-effect waves-light float-start back-btn" data-curr="<?= $question->id?>" data-prev="<?= $question->id-1?>">
												<i class="bx bx-chevron-left"></i> Back
											</button>

											<button type="button" class="btn btn-success btn-rounded waves-effect waves-light float-end finish-btn d-none">
												Finish <i class="bx bx-check-double"></i>
											</button>

											<button type="button" class="btn btn-light btn-rounded waves-effect waves-light float-end next-btn mx-2 d-none" id="next_btn_<?= $question->id?>" data-curr="<?= $question->id?>" data-next="<?= $question->id+1?>">
												Next <i class="bx bx-chevron-right"></i>
											</button>

										</div>

									</div>
								<?php }
								?>
							</div>
						</div>

						<div class="row user-form mt-5 d-none">
							<div class="offset-xl-3 col-xl-6 mt-5">
								<div class="card">
									<div class="card-body">
										<h4 class="card-title">YOU’RE ALMOST DONE!</h4>
										<h2 class="card-title mb-2">Where should we send your Life Wheel results?</h2>
										<p class="card-title-desc">Please enter your name and email address</p>
										<div class="row">
											<div class="col-md-6">
												<div class="mb-3">
													<label for="firstName" class="form-label">First name</label>
													<input type="hidden" id="source" name="source" value="source">
													<input type="text" class="form-control" id="firstName" name="first_name" placeholder="First name" value="" required>
													<div class="invalid-feedback">First Name is required.</div>
												</div>
											</div>
											<div class="col-md-6">
												<div class="mb-3">
													<label for="email" class="form-label">Email</label>
													<input type="text" class="form-control" id="email" name="email" placeholder="Enter your Email..." required>
													<div class="invalid-feedback">Please Enter Email Address.</div>
												</div>
											</div>
											<div class="col-md-12">
												<button class="btn float-end mt-4 text-white" style="    background: #5f9acb;" type="submit">Get my result</button>
											</div>
										</div>
									</div>
								</div>
							</div>
						</div>

					<?php }?>
				</form>
			</div>
		</div>
	</div>

	<?php include('footer_script.php') ?>
	
	

	<script type="text/javascript">

		$(document).on('click', '.rating-star', function(e){
			var option = $(this).data('option');
			var curr_id = $(this).data('current');

			$('.rating-star').removeClass('optn-sty');
			$('#q'+curr_id+'box_'+option).addClass('optn-sty');
			$('#score_id_'+curr_id).val(option);		
			if(curr_id <= 9)
				$('#next_btn_'+curr_id).removeClass('d-none');
			else
				$('.finish-btn').removeClass('d-none');
		});

		$(document).on('click', '.back-btn', function(e){
			var curr_id = $(this).data('curr');
			var prev_id = $(this).data('prev');
			$('.finish-btn').addClass('d-none');
			if(curr_id > 1 ){
				$('#card_id_'+curr_id).addClass('d-none');
				$('#card_id_'+prev_id).removeClass('d-none');
			}else{
				window.location.replace("<?= base_url()?>");
			}

		});

		$(document).on('click', '.next-btn', function(e){
			var curr_id = $(this).data('curr');
			var next_id = $(this).data('next');
			console.log('current' + curr_id , 'Next' +next_id);
			var attr = $('#score_id_'+next_id).attr('value');

			if(next_id <= 10 ){

				$('#card_id_'+curr_id).addClass('d-none');
				$('#card_id_'+next_id).removeClass('d-none');
			}
			if(curr_id == 10 && typeof attr !== 'undefined' && attr !== false){
				
				$('.finish-btn').removeClass('d-none');
			}else{
				$('.finish-btn').addClass('d-none');
			}
		});

		$(document).on('click', '.finish-btn', function(e){
			$('.main_div').addClass('d-none');
			$('.user-form').removeClass('d-none');
		});

	</script>

</body>
</html>

