<?php

require_once('src/db/connect.php');

?>

<!DOCTYPE html>
<html>
<head>
	  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
      <link type="text/css" rel="stylesheet" href="../src/styles/style.css" />
      <title>List of events</title>

</head>
<body>
	<div id="gridContainer">
		<?php require_once('src/utils/header.php') ?>
		<div class="info2">
				<ul>	
					<li>List of events</li>
					<li><a href="/">Go back</a></li>
				</ul>
		</div>
		<table id="Events">
			<tr>
				<th>Event Name</th>
				<th>Event day</th>
			</tr>
			<?php
			
			$stmt = $db->prepare('SELECT * FROM Events');
			$stmt->execute();
			$events = $stmt->fetchAll(PDO::FETCH_ASSOC);

			foreach ($events as $event) {
				echo "	<tr>
							<th>".$event['name']."</th>
							<th>".$event['date']."</th>
						</tr>";
			}
			
			?>
		</table>
	</div>
	<?php require_once('src/utils/footer.php') ?>
</body>
</html>
