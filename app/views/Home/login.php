<main>
	<?php if (isset($DATA['message'])): ?>
	<p><?= Security::escape($DATA['message']); ?></p>
	<?php endif; ?>
	<p>Login credentials:<br/>
		Email: <strong>john.doe@example.com</strong><br/>
		Password: <strong>admin</strong>
	</p>
	<form method="POST">
		<label>
			<span>Email:</span>
			<input type="email" name="email" required>
		</label>
		<label>
			<span>Password:</span>
			<input type="password" name="password" required>
		</label>
		<button type="submit">Log in</button>
	</form>
</main>