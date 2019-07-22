<!-- Breadcrumbs-->
<ol class="breadcrumb mx-2" >
<?php foreach ($this->uri->segments as $segment): ?>
	<?php 
		$url = substr($this->uri->uri_string, 0, strpos($this->uri->uri_string, $segment)) . $segment;
		$is_active =  $url == $this->uri->uri_string;
	?>


	<li class="breadcrumb-item <?php echo $is_active ? 'active': '' ?>">
		<?php if($is_active): ?>
			<?php echo ucfirst($segment) ?>
		<?php else: ?>
			<?php echo ucfirst($segment) ?>
		<?php endif; ?>
	</li>
<?php endforeach; ?>
</ol>
