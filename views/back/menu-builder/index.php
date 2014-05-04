
<?php

   use yii\helpers\Url ;
?>
<?php

?>
<div id="msg">
    this is for debug displaying .
</div>


<?= year\widgets\ZTree::widget() ?>
<script type="text/javascript">
    var ajaxUrl = '<?= Url::to(['load-children']) ?>';
    <!--
    var setting = {
        view: {
            selectedMulti: false
        },
        async: {
            enable: true,
            url:ajaxUrl,
            autoParam:["id", "name=n", "level=lv"],
            otherParam:{"otherParam":"zTreeAsyncTest"},
            dataFilter: filter
        },
        callback: {
            beforeClick: beforeClick,
            beforeAsync: beforeAsync,
            onAsyncError: onAsyncError,
            onAsyncSuccess: onAsyncSuccess,
            onRightClick: OnRightClick
        }
    };

    /**
     * 右键菜单
     */
    function OnRightClick(event, treeId, treeNode) {
        if (!treeNode && event.target.tagName.toLowerCase() != "button" && $(event.target).parents("a").length == 0) {
            zTree.cancelSelectedNode();
            showRMenu("root", event.clientX, event.clientY);
        } else if (treeNode && !treeNode.noR) {
            zTree.selectNode(treeNode);
            showRMenu("node", event.clientX, event.clientY);
        }
       // alert("右键");
    }

    function filter(treeId, parentNode, childNodes) {
        if (!childNodes) return null;
        for (var i=0, l=childNodes.length; i<l; i++) {
            childNodes[i].name = childNodes[i].name.replace(/\.n/g, '.');
        }
        return childNodes;
    }
    function beforeClick(treeId, treeNode) {
        editMenu(treeNode.id);
        return true ;
        /*if (!treeNode.isParent) {
            alert("请选择父节点");
            return false;
        } else {
            return true;
        }*/
    }
    var log, className = "dark";
    function beforeAsync(treeId, treeNode) {
        className = (className === "dark" ? "":"dark");
        showLog("[ "+getTime()+" beforeAsync ]&nbsp;&nbsp;&nbsp;&nbsp;" + ((!!treeNode && !!treeNode.name) ? treeNode.name : "root") );
        return true;
    }
    function onAsyncError(event, treeId, treeNode, XMLHttpRequest, textStatus, errorThrown) {
        showLog("[ "+getTime()+" onAsyncError ]&nbsp;&nbsp;&nbsp;&nbsp;" + ((!!treeNode && !!treeNode.name) ? treeNode.name : "root") );
    }
    function onAsyncSuccess(event, treeId, treeNode, msg) {
        showLog("[ "+getTime()+" onAsyncSuccess ]&nbsp;&nbsp;&nbsp;&nbsp;" + ((!!treeNode && !!treeNode.name) ? treeNode.name : "root") );
    }

    function showLog(str) {
        if (!log) log = $("#log");
        log.append("<li class='"+className+"'>"+str+"</li>");
        if(log.children("li").length > 8) {
            log.get(0).removeChild(log.children("li")[0]);
        }
    }
    function getTime() {
        var now= new Date(),
            h=now.getHours(),
            m=now.getMinutes(),
            s=now.getSeconds(),
            ms=now.getMilliseconds();
        return (h+":"+m+":"+s+ " " +ms);
    }

    function refreshNode(e) {
        var zTree = $.fn.zTree.getZTreeObj("treeDemo"),
            type = e.data.type,
            silent = e.data.silent,
            nodes = zTree.getSelectedNodes();
        if (nodes.length == 0) {
            alert("请先选择一个父节点");
        }
        for (var i=0, l=nodes.length; i<l; i++) {
            zTree.reAsyncChildNodes(nodes[i], type, silent);
            if (!silent) zTree.selectNode(nodes[i]);
        }
    }

    var zTree, rMenu;
    $(document).ready(function(){
        $.fn.zTree.init($("#treeDemo"), setting);
        zTree = $.fn.zTree.getZTreeObj("treeDemo");
        rMenu = $("#rMenu");
    });
    //-->
</script>


<div class="container-fluid">
    <div class="col-xs-6 col-md-3">
        <a href="javascript:reloadTree()" accesskey="">刷新树</a>
        <div>
            <ul id="treeDemo" class="ztree"></ul>


        </div>


    </div>
    <div class="col-xs-12 col-md-9">

        <?= year\widgets\IFrameAutoHeight::widget() ?>
        <script type="text/javascript">
            $(function () {
                $('iframe').iframeAutoHeight(
                    {
                        debug: true
                    }
                );
            });
        </script>
        <iframe
            name="contentFrame"
            id="contentFrame"
            src="<?= \yii\helpers\Url::to(array('site/index')) ?>"
            width="100%"
            height="800px"
            scrolling="no"
            >
        </iframe>


    </div>
    </div>

</div>

<div id="rMenu">
    <ul>
        <li id="m_add" onclick="addTreeNode();">增加节点</li>
        <li id="m_del" onclick="removeTreeNode();">删除节点</li>
        <li id="m_check" onclick="checkTreeNode(true);">Check节点</li>
        <li id="m_unCheck" onclick="checkTreeNode(false);">unCheck节点</li>
        <li id="m_reset" onclick="resetTree();">恢复zTree</li>
    </ul>
</div>

<p style="clear: both;"></p>


<p>
    <tt><?php echo __FILE__; ?></tt>.
</p>

<?= year\widgets\JContextMenu::widget() ?>
<script type="text/javascript">


    function debug(msg) {
        $("#msg").html(msg);
    }
    //define node operations
    /**
     * @param moveMode  after before
     * @param sourceNodeId  the current active nodeId
     * @param refNodeId     reference node
     */
    function move(moveMode, sourceNodeId, refNodeId) {
        var url = "<?php echo Url::to(['moveNode']); ?>";
        var params = {
            "moveMode":moveMode,
            "srcNode":sourceNodeId,
            "refNode":refNodeId
        };
        var response = $.ajax({
            url:url,
            data:params,
            type:"POST",
            async:false
            // ,dataType: "json"
        }).responseText;
        //debug(typeof response);
        response = $.parseJSON(response);
        return response.error;
    }

    /**
     * delete a node
     * @param nodeId
     */
    function deleteNode(nodeId) {
        if(!confirm("你真的想要删除么？","提醒")) return ;
        var url = "<?php echo Url::to(['deleteNode']); ?>";
        var params = {
            "nodeId":nodeId
        };
        var response = $.ajax({
            url:url,
            data:params,
            type:"POST",
            async:false
            // ,dataType: "json"
        }).responseText;
        //debug(typeof response);
        response = $.parseJSON(response);
        return response.error;
    }

    function createMenu(parentId) {
        var url = "<?php echo  Url::to(['/admin-menu/create','layout' => 'false', 'parentId'=>'{parentId}']); ?>";
        url = url.replace(encodeURIComponent("{parentId}"), parentId);
        $("#contentFrame").attr('src',url);
    }

    function editMenu(nodeId) {
        var url = "<?php echo  Url::to(['/admin-menu/update','id' => '{id}', 'layout' => 'false']); ?>";
        url = url.replace(encodeURIComponent("{id}"), nodeId);
        alert(url);
        $("#contentFrame").attr('src',url);
    }
    $(function () {
        /*
         $("#helperFrame").load(function () {
         var $body = $(this).contents().find('body');
         $('form', $body).attr('target', 'helperFrame');
         $("#menuOpContainer").html($body.html());
         //刷新当前父亲节点：
         $.ui.dynatree.getActiveNode().reloadChildren();
         });
         */
    });
    function reloadTree(){
        var tree = $("#tree").dynatree("getTree");
        tree.reload()
        //var root  = tree.getRoot()
    }

    //------------------------------------------------------------\\
    function showRMenu(type, x, y) {
        $("#rMenu ul").show();
        if (type=="root") {
            $("#m_del").hide();
            $("#m_check").hide();
            $("#m_unCheck").hide();
        } else {
            $("#m_del").show();
            $("#m_check").show();
            $("#m_unCheck").show();
        }
        rMenu.css({"top":y+"px", "left":x+"px", "visibility":"visible"});

        $("body").bind("mousedown", onBodyMouseDown);
    }
    function hideRMenu() {
        if (rMenu) rMenu.css({"visibility": "hidden"});
        $("body").unbind("mousedown", onBodyMouseDown);
    }
    function onBodyMouseDown(event){
        if (!(event.target.id == "rMenu" || $(event.target).parents("#rMenu").length>0)) {
            rMenu.css({"visibility" : "hidden"});
        }
    }
    var addCount = 1;
    function addTreeNode() {
        hideRMenu();
        var newNode = { name:"增加" + (addCount++)};
        if (zTree.getSelectedNodes()[0]) {
            newNode.checked = zTree.getSelectedNodes()[0].checked;
            zTree.addNodes(zTree.getSelectedNodes()[0], newNode);
        } else {
            zTree.addNodes(null, newNode);
        }
    }
    function removeTreeNode() {
        hideRMenu();
        var nodes = zTree.getSelectedNodes();
        if (nodes && nodes.length>0) {
            if (nodes[0].children && nodes[0].children.length > 0) {
                var msg = "要删除的节点是父节点，如果删除将连同子节点一起删掉。\n\n请确认！";
                if (confirm(msg)==true){
                    zTree.removeNode(nodes[0]);
                }
            } else {
                zTree.removeNode(nodes[0]);
            }
        }
    }
    function checkTreeNode(checked) {
        var nodes = zTree.getSelectedNodes();
        if (nodes && nodes.length>0) {
            zTree.checkNode(nodes[0], checked, true);
        }
        hideRMenu();
    }
    //------------------------------------------------------------//
</script>

<style type="text/css">
    div#rMenu {position:absolute; visibility:hidden; top:0; background-color: #555;text-align: left;padding: 2px;}
    div#rMenu ul li{
        margin: 1px 0;
        padding: 0 5px;
        cursor: pointer;
        list-style: none outside none;
        background-color: #DFDFDF;
    }
</style>


