<h2 style="font-style: italic;font-family: 'Times New Roman';">"<?php echo h($post['Post']['title']); ?>"</h2>

<p><a href="<?php echo h($post['Post']['doc_url']); ?>" target="_blank">論文リンク</a></p>

<p>著者: <?php echo h($post['Post']['author']); ?>, <?php echo h($post['Post']['year']); ?></p>

<p><?php echo h($post['Post']['published_at']); ?></p>

<p class="ckeditor" style="border-style: solid; border-width: 1px;">
<?php echo htmlspecialchars_decode($post['Post']['body']); ?>
</p>