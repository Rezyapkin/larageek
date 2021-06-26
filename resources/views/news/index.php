<h1>Новости</h1>

<?php foreach($newsList as $news): ?>
<div>
<h3><a href="<?=route('newsOne', ['id'=>$news['id']])?>"><?=$news['caption']?></a></h3>
<p><?=$news['date']?></p>
<hr>
</div>
<?php endforeach; ?>