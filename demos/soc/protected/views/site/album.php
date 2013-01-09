<?php if($album === null): ?>
<div>Album doesn't exist</div>
<?php elseif(sizeof($photos) == 0): ?>
<div>No photos in album</div>
<?php else: ?>
<?php foreach($photos as $photo): ?>
<div><b><?php echo $photo->title ?></b></div>
<div style="padding-bottom: 10px"><?php echo $photo->path ?></div>
<?php endforeach; ?>
<?php endif; ?>