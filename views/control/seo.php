<h3>Seo</h3>
<ul class="nav nav-tabs">
    <?php $first = true; foreach($groups as $group=>$data):?>
    <li<?= $first?' class="active"':''?>><a href="#<?= $group?>" data-toggle="tab"><?= $data['title']?></a></li>
    <?php $first = false; endforeach;?>
</ul>
<form class="form-horizontal" method="post" enctype="multipart/form-data">
    <div class="tab-content">
        <?php $first = true; foreach($groups as $group=>$data):?>
        <div id="<?= $group?>" class="tab-pane<?= $first?' active':''?>">
            <?php foreach($data['items'] as $item):?>
                <h4><?= $item->title()?></h4>
                <?php foreach(array('title'=>'text', 'keywords'=>'textarea', 'meta'=>'textarea') as $v=>$type):?>
                    <label ><h5><?php echo ucfirst($v)?></h5></label>
                    <div>
					<?php echo View::factory('control/editors/'.$type, array(
                        'item' => Seo::get($item),
                        'name' => 'groups['.$group.']['.$item->pk().']['.$v.']',
                        'field' => $v,
                    ));?>
                    </div>
                <?php endforeach;?>
                <hr>
            <?php endforeach;?>
        </div>
        <?php $first = false; endforeach;?>
    <div class="control-group">
        <div class="controls">
            <?php echo Form::submit('', 'Сохранить', array('class' => 'btn btn-primary','style' => 'position: relative; right: 180px;top: 10px'))?>
        </div>
    </div>
</form>