<?php
/**
 * @var \yii\web\View $this
 * @var string $content
 */
?>
<?= year\widgets\IFrameAutoHeight::widget() ?>

<iframe src="<?=  \yii\helpers\Url::to(array('site/index')) ?>" width="100%" scrolling="no"
        height="800px"
    ></iframe>

<script type="text/javascript">
    $(function(){
        $('iframe').iframeAutoHeight({debug: true});
    });
</script>