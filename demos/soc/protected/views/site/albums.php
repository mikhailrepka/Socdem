<?php if(sizeof($albums) == 0): ?>
<div>No albums created</div>
<?php else: ?>
<?php foreach($albums as $album): ?>
<div><b><a href="?r=site/albums&id=<?php echo $album->id ?>"><?php echo $album->title ?></a></b></div>
<div style="padding-bottom: 10px"><?php echo $album->description ?></div>
<?php endforeach; ?>
<?php endif; ?>