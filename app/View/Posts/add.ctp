<h2>論文の解説を投稿</h2>

<?php
echo $this->Form->create('Post');
echo $this->Form->input('title', array('label'=>'タイトル'));
echo $this->Form->input('author', array('label'=>'著者'));
echo $this->Form->input('year', array('label'=>'年'));
echo $this->Form->input('published_at', array('label'=>'出版'));
echo $this->Form->input('doc_url', array('label'=>'論文リンク'));
echo $this->Form->input('key_words', array('label'=>'キーワード'));
echo $this->Form->textarea('body', array('class'=>'ckeditor', 'label'=>'解説'));
echo $this->Form->end('投稿する');
?>