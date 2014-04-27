<?php
/**
 * Created by PhpStorm.
 * User: yiqing
 * Date: 14-4-28
 * Time: 上午12:14
 */
year\widgets\JCropper::widget();
?>

<div class="row">
    <div class="col-md-8">
        <img class="cropper"
                               width="400px"
                               src="http://pic1.sdnews.com.cn/NewsImg/2007/04/0428meinv.jpg">
    </div>
    <div class="col-md-4">
        <div class="extra-preview">

        </div>
    </div>
</div>


<script type="text/javascript">
    $(".cropper").cropper({
        aspectRatio: 16/9,
        modal: false,
        preview: ".extra-preview",
        done: function(data) {
            console.log(data);
        }
    });

</script>

