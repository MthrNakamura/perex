
<ul>

<?php foreach ($posts as $post) : ?>

<li id="post_<?php echo h($post['Post']['id']);?>">
	<?php 
		echo $this->Html->link(
		$post['Post']['title'] . "[" . $post['Post']['author'] . "," . $post['Post']['year'] . "]", 
		'/posts/view/'.$post['Post']['id']);
	?>
	
	<?php
		echo $this->Html->link('編集', array('action'=>'edit', $post['Post']['id']));
	?>
	
	<?php
		echo $this->Html->link('削除', '#', array('class'=>'delete', 'data-post-id'=>$post['Post']['id']));
	?>
	
</li>

<?php endforeach; ?>

</ul>

<h2>
<?php 
	echo $this->Html->link('解説を投稿', array('action' => 'add'));
?>
</h2>

<script>

$(function(){
	$('a.delete').click(function(e){
		if (confirm('削除してもよろしいですか?')) {
			$.post('/perex/posts/delete/'+$(this).data('post-id'), {}, function(res){
				$('#post_'+res.id).fadeOut("slow");
			}, "json");
		}
		return false;
	});		
});

</script>