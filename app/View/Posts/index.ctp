<div style='text-align:center;'>
<img src="/perex/img/perex logo.png" style="height:40%;width:40%;" />
<div style="width:50%;margin:0px auto;">
	<?php
		echo $this->Form->create('Post', array('url' => array_merge(array('action' => 'search'), $this->params['pass'])));
		echo $this->Form->input('title', array('label' => false, 'placeholder' => 'キーワードで検索'));
		echo $this->Form->end();
	?>
</div>
</div>

<h2>
<?php 
	echo $this->Html->link('解説を投稿', array('action' => 'add'));
?>
</h2>
<!--
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
-->
</script>