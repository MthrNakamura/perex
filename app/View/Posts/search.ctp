<?php echo $this->Html->css('/css/search.css'); ?>

<div class="search-head">
<div class="perex-logo">
	<?php echo $this->Html->image('/img/perex logo small.png', array('url' => array('action' => 'index'))); ?>
</div>
	<div class='search-box-wrap'>
	<div class='search-box'>
		<?php
		echo $this->Form->create('Post', array('url' => array_merge(array('action' => 'search'), $this->params['pass'])));
		echo $this->Form->input('title', array('label' => false, 'placeholder' => 'キーワードで検索'));
		echo $this->Form->end();
		?>
	</div>
	</div>
</div>


<div>
<ul style="list-style-type: none;">

<p style="margin-top: 5%;">検索結果: <?php echo sizeof($posts); ?>件</p>
<?php if (sizeof($posts) > 0) : ?>
<?php foreach ($posts as $post) : ?>

<li id="post_<?php echo h($post['Post']['id']);?>" style="font-size:12pt; margin-top:25px;">
	<?php echo $this->Html->link($post['Post']['title'], '/posts/view/'.$post['Post']['id'], array('class' => 'doc-link'))?>
	<br>
	<?php echo "著者: " . h($post['Post']['author']); ?>
	<?php if ($post['Post']['year']): ?>
	<br>
	<?php echo "出版: " . h($post['Post']['year']) . "年" . " " . h($post['Post']['published_at']); ?>
	<?php endif; ?>
	<!--
	<?php
		echo $this->Html->link('編集', array('action'=>'edit', $post['Post']['id']));
	?>
	<?php
		echo $this->Html->link('削除', '#', array('class'=>'delete', 'data-post-id'=>$post['Post']['id']));
	?>
	-->
</li>

<?php endforeach; ?>
<?php endif; ?>

</ul>
</div>
<?php if (sizeof($posts) > 15): ?>
<div style='text-align: center;'>
<?php
echo $this->Form->create('Post', array('url' => array_merge(array('action' => 'search'), $this->params['pass'])));
echo $this->Form->input('title', array('label' => false, 'placeholder' => 'キーワードで検索', 'style' => 'width:50%; margin-left:10%;'));
echo $this->Form->end();
?>
</div>
<?php endif; ?>