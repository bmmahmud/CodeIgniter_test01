
<?php include_once('header.php');?>
<!-- Table -->
<div class="container">
<h3>View All Posts: </h3>
<?php if($msg = $this->session->flashdata('msg')):?>
<?php echo $msg;?>
<?php endif;?>

<?php echo anchor('welcome/creat', 'ADD POST', array('class' => 'btn btn-primary'));?>

<table class="table table-hover">
  <thead>
    <tr>
      <th scope="col">Title</th>
      <th scope="col">Decription</th>
      <th scope="col">Create Date</th>
      <th scope="col">Action</th>
    </tr>
  </thead>
  <tbody>
  <?php if(count($post)):?>
  <?php foreach($post as $posts):?>
    <tr>
      <td><?php echo $posts->title;?></td>
	  <td><?php echo $posts->description;?></td>
	  <td><?php echo $posts->date_created;?></td>

      <td>
	  <?php echo anchor("welcome/view/{$posts->id}", 'View', array('class' => 'badge badge-primary'));?>
	  <?php echo anchor("welcome/update/{$posts->id}", 'Update', array('class' => 'badge badge-success'));?>
	  <?php echo anchor("welcome/delete/{$posts->id}", 'Delete', array('class' => 'badge badge-danger'));?>
	  </td>
    </tr> 
	<?php endforeach;?>
<?php else:?>
	<tr>
	<td>No record found</td>
	</tr>
<?php endif;?>
  </tbody>
</table> 
</div>
<?php include_once('footer.php');?>