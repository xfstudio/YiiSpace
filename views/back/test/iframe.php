<?php
/**
 * @var \yii\web\View $this
 * @var string $content
 */
?>
<?= year\widgets\IFrameResizer::widget() ?>

<iframe src="<?=  \yii\helpers\Url::to(array('site/index')) ?>" width="100%" scrolling="no"
    height="800px"
    ></iframe>

<script type="text/javascript">
    $(function(){
        $('iframe').iFrameResize({
            scrolling:true,
            autoResize: true
        });
    });
</script>