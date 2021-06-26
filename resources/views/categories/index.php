<h1>Категории новостей</h1>
<ul>
<?php foreach($categoriesList as $category): ?>
<li>
<a href="<?=route('showByCategory', ['id'=>$category['id']])?>"><?=$category['name']?></a>
</li>
<?php endforeach; ?>
</ul>