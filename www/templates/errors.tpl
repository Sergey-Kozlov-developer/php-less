<?php if (isset($_SESSION['errors']) && !empty($_SESSION['errors'])): ?>
	<div class="alert-wrapper">
		<?php foreach ($_SESSION['errors'] as $error) echo notify($error, 'error'); ?>
	</div>
	<?php $_SESSION['errors'] = []; ?>
<?php endif; ?>

<?php if (isset($_SESSION['success']) && !empty($_SESSION['success'])): ?>
	<div class="alert-wrapper">
		<?php foreach ($_SESSION['success'] as $error) echo notify($success, 'success'); ?>
	</div>
	<?php $_SESSION['success'] = []; ?>
<?php endif; ?>

<?php if (isset($_SESSION['warning']) && !empty($_SESSION['warnings'])): ?>
	<div class="alert-wrapper">
		<?php foreach ($_SESSION['warnings'] as $error) echo notify($warning, 'warning'); ?>
	</div>
	<?php $_SESSION['warnings'] = []; ?>
<?php endif; ?>