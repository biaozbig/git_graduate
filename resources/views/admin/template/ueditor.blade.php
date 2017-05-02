<?php AssetBuilder::setStatus('ueditor', true); ?>



<div class="form-group ">
    <label class="control-label col-sm-2">内容</label>

    <div class="col-sm-10">
        <textarea name="content" id="myEditor" ></textarea>
        <span class="help-block"></span>
    </div>
</div>

<script type="text/javascript">
    UE.getEditor('myEditor', {
        theme:"default", //皮肤
        lang:"zh-cn", //语言
        initialFrameWidth:800,  //初始化编辑器宽度,默认800
        initialFrameHeight:320
    });
</script>
