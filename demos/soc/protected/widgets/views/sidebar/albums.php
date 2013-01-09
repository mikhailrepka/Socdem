<?php foreach($data as $album): ?>
<div><a href="?r=site/albums&id=<?php echo $album->id ?>"><?php echo $album->title ?></a></div>
<?php endforeach; ?>