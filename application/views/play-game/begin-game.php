<div class="container">
	<p class="pull-right">
		Current score :<?php echo (!empty($userCurrentScore)) ? $userCurrentScore[0]->score : 0;?>
		<br/>Level : <span id="level"><?php echo $level;?></span><br/>
		Duration : <?php echo $time;?> seconds<br/>
		Time taken : <?php echo (!empty($userCurrentScore)) ? $userCurrentScore[0]->time_taken : 0;?> seconds
	</p>
	<div class="clearfix"></div>
	<hr/>
	<div class="row">
		<div class="col-md-3">
		<p>Score : <span id="score">0</span></p>
		</div>
		<div class="col-md-5">
			<button class="btn btn-block btn-primary" id="start-game">Lets begin the game</button>
		</div>
		<div class="col-md-4">

			<span id="timer" data-time="<?php echo $time;?>" class="pull-right"></span>
		</div>
	</div>
	<hr/>
	<div class="row">
		<div class="col-md-12">
			<div class="shapes hidden">
			<?php foreach (array_chunk($shapes,12) as  $randomShapes) :?>
				<div class="row">
				<?php foreach ($randomShapes as $shape) :?>
					<div class="col-md-1">
						<div class="<?php echo $shape;?>">
						</div>
					</div>
				<?php endforeach;?>
				</div>
				<br/>
			<?php endforeach;?>
			</div>

		</div>
	</div>
	<div class="row shape-submit-section hidden">
		<div class="col-md-offset-2 col-md-2">
		<form action="play_game/submittedScore" method="post" id="play_game_submit">
			<input type="hidden" name="level" value="" id="play_game_level"/>
			<input type="hidden" name="score" value="" id="play_game_score"/>
			<input type="hidden" name="time_taken" value="" id="play_game_time_taken"/>
			<input type="hidden" name="user" value="<?php echo $user;?>"/>
			<button class="btn btn-block btn-primary" type="submit">Submit score</button>
		</form>
	</div> 
</div>