
<?php if($this->session->flashdata('alert_success')) : ?>
	<div class="alert alert-success" role="alert" style="display:block;">
		<button type="button" class="close" data-dismiss="alert">×</button>
        <strong>Сообщение</strong> - <?php echo $this->session->flashdata('alert_success'); ?>
	</div>
<?php endif; ?>

<?php if($this->session->flashdata('alert_info')) : ?>
	<div class="alert alert-info" role="alert" style="display:block;">
		<button type="button" class="close" data-dismiss="alert">×</button>
        <strong>Сообщение</strong> - <?php echo $this->session->flashdata('alert_info'); ?>
	</div>
<?php endif; ?>

<?php if($this->session->flashdata('alert_warning')) : ?>
	<div class="alert alert-warning" role="alert" style="display:block;">
		<button type="button" class="close" data-dismiss="alert">×</button>
        <strong>Сообщение</strong> - <?php echo $this->session->flashdata('alert_warning'); ?>
	</div>
<?php endif; ?>

<?php if($this->session->flashdata('alert_danger')) : ?>
	<div class="alert alert-danger" role="alert" style="display:block;">
		<button type="button" class="close" data-dismiss="alert">×</button>
        <strong>Сообщение</strong> - <?php echo $this->session->flashdata('alert_danger'); ?>
	</div>
<?php endif; ?>
