<h1>Welcome!</h1>
<p><?= htmlspecialchars($name) ?></p>
<ul>
	<?php foreach ($colors AS $color): ?>
	<li><?= htmlspecialchars($color) ?></li>
	<?php endforeach; ?>
</ul>
