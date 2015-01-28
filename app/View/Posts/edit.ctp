<h2>論文解説を編集</h2>

<?php

echo $this->Form->create('Post', array('action'=>'edit'));
echo $this->Form->input('title', array('name' => 'title'));
echo $this->Form->input('author');
echo $this->Form->input('published_at');
echo $this->Form->input('year');
echo $this->Form->input('doc_url');
echo $this->Form->input('key_words');
echo $this->Form->textarea('body', array('class'=>'ckeditor'));
echo $this->Form->end('編集を完了する');

?>