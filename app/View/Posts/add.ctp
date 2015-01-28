<h2>論文の解説を投稿</h2>

<?php
echo $this->Form->create('Post');
echo $this->Form->input('title');
echo $this->Form->input('author');
echo $this->Form->input('year');
echo $this->Form->input('published_at');
echo $this->Form->input('doc_url');
echo $this->Form->input('key_words');
echo $this->Form->textarea('body', array('class'=>'ckeditor'));
echo $this->Form->end('投稿する');
?>