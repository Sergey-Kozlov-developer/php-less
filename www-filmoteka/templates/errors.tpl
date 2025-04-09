<?php if (isset($_SESSION['errors']) && !empty($_SESSION['errors'])): ?>
	<div class="alert-wrapper">
		<?php foreach ($_SESSION['errors'] as $error) echo notify($error, 'error'); ?>
	</div>
	<?php $_SESSION['errors'] = []; ?>
<?php endif; ?>

<?php if (isset($_SESSION['success']) && !empty($_SESSION['success'])): ?>
	<div class="alert-wrapper">
		<?php foreach ($_SESSION['success'] as $success) echo notify($success, 'success'); ?>
	</div>
	<?php $_SESSION['success'] = []; ?>
<?php endif; ?>

<?php if (isset($_SESSION['warnings']) && !empty($_SESSION['warnings'])): ?>
	<div class="alert-wrapper">
		<?php foreach ($_SESSION['warnings'] as $warning) echo notify($warning, 'warning'); ?>
	</div>
	<?php $_SESSION['warnings'] = []; ?>
<?php endif; ?>