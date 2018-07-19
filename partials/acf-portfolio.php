<?php 


$projects = get_project_list();

echo "<!--";
print_r($projects);
echo "-->";

$web = [];
$print = [];
$video = [];
$other = [];

foreach ($projects as $project) { 

	if ($project -> additional_fields[project_type] == "Website") {
		$web[] = $project;
	} else if ($project -> additional_fields[project_type] == "Print") {
		$print[] = $project;
	} else if ($project -> additional_fields[project_type] == "Video") {
		$video[] = $project;
	} else {
		$other[] = $project;
	}

}


?>


<div class="project-contain">
	<div class="project-type-wrap">
		<h2>Web</h2>
		<?php

			$count = 0;

			foreach ($web as $webs):
				$count++; ?>

				<p class="show<?php echo $count; ?> show"><?php echo $webs -> post_title; ?></p>

			<?php endforeach; ?>
	</div>
	<div class="project-type-wrap">
		<h2>Print</h2>
		<?php

			foreach ($print as $prints):
				$count++; ?>

				<p class="show<?php echo $count; ?> show"><?php echo $prints -> post_title; ?></p>

			<?php endforeach; ?>
	</div>
	<div class="project-type-wrap">
		<h2>Video</h2>
		<?php

			foreach ($video as $videos):
				$count++; ?>

				<p class="show<?php echo $count; ?> show"><?php echo $vidoes -> post_title; ?></p>

			<?php endforeach; ?>
	</div>
</div>
<div class="display-projects">
	<?php

		$count = 0;

		foreach ($web as $webs):
			$count++; ?>

			<div class="row<?php echo $count; ?> row">
				<div class="reveal">
					<div class="reveal-col">
						<h3><?php echo $webs -> post_title ?></h3>
						<p><?php echo $webs -> post_content; ?></p>
						<h4>Skills Required:</h4>
						<ul>
							<?php
							foreach ($webs -> additional_fields['required_skills'] as $skills) { ?>
								<li><?php echo $skills; ?></li>
							<?php }
							?>
						</ul>
					</div>
					<div class="reveal-col">
						<div class="reveal-img">
							<img src="<?php echo $webs -> image_paths['large']; ?>">
						</div>
						<div class="button">
							<a href="http://<?php echo $webs -> additional_fields['website_link']; ?>" target="_blank">Visit Site &rarr;</a>
						</div>
					</div>
				</div>
			</div>

	<?php endforeach; ?>
	<?php 
		foreach ($print as $prints):
			$count++; ?>

			<div class="row<?php echo $count; ?> row">
				<div class="reveal">
					<div class="reveal-col">
						<h3><?php echo $prints -> post_title ?></h3>
						<p><?php echo $prints -> post_content; ?></p>
						<h4>Skills Required:</h4>
						<ul>
							<?php
							foreach ($prints -> additional_fields['required_skills'] as $skills) { ?>
								<li><?php echo $skills; ?></li>
							<?php }
							?>
						</ul>
					</div>
					<div class="reveal-col">
						<div class="reveal-img">
							<img src="<?php echo $prints -> image_paths['large']; ?>">
						</div>
					</div>
				</div>
			</div>

	<?php endforeach; ?>
</div>


