<?php $this->beginContent('//layouts/yiistrap'); ?>
    <div class="row-fluid">

        <div class="span9">
            <?php echo $content; ?>
        </div>

        <div class="span3">
            <div class="well">
            <?php
            $this->widget('zii.widgets.CMenu', array(
                'items'=>$this->menu,
                'htmlOptions'=>array('class'=>'nav nav-list'),
                'firstItemCssClass'=>'nav-header',
                'activeCssClass'=>'active',
            ));
            ?>
            </div>
        </div>
    </div>
<?php $this->endContent(); ?>