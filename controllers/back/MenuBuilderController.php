<?php

namespace app\controllers\back;

use Yii;
use admin\models\AdminMenu;
use admin\models\AdminMenuSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;


class MenuBuilderController extends Controller
{
    /**
     * @var boolean whether to enable CSRF validation for the actions in this controller.
     * CSRF validation is enabled only when both this property and [[Request::enableCsrfValidation]] are true.
     */
    public $enableCsrfValidation = false; // <- set this to false

    public $layout = 'adminMenu';

    public function beforeAction($action){
        if(isset($_REQUEST['layout'])){
            $this->layout = 'blank';
        }

        return parent::beforeAction($action);
    }

    public function actionIndex()
    {
        return $this->render('index');
    }

    public function actionInitAjax()
    {
        if (Yii::app()->getRequest()->getIsAjaxRequest()) {
            $topRoot = AdminMenu::model()->find('group_code=:group_code', array(':group_code' => 'sys_admin_menu_root'));
            $dynaTreeData = array();
            $roots = $topRoot->children()->findAll();
            foreach ($roots as $root) {
                $dynaTreeData[] = array(
                    'title' => $root->label,
                    'key' => $root->id,
                    'isLazy' => true,
                    'isFolder' => true,
                );
            }
            echo CJSON::encode($dynaTreeData);
            die();
        }
    }

    public function actionLoadChildren()
    {

        $pid = Yii::$app->getRequest()->post('id');
        if(null == $pid){
            $topRoot = AdminMenu::findOne(['group_code' => 'sys_admin_menu_root']);
            $roots = $topRoot->children()->all();
            $treeData = [];
            foreach ($roots as $root) {
                $treeData[] = array(
                    'id'=>$root->primaryKey,
                    'name' => $root->label,
                    'isParent'=>true,
                    'class'=> 'ztee-node',
                    /*
                   'key' => $root->id,
                   'isLazy' => true,
                   'isFolder' => true,
                    */
                );
            }


        }else{
            // 第二、N次加载 加载孩子节点
            $curNode = AdminMenu::findOne($pid);
            $children = $curNode->children()->all();
            $treeData = [];
            foreach ($children as $node) {
                $nodeData = array(
                    'id'=>$node->primaryKey,
                    'name' => $node->label,
                    'isParent'=>!$node->isLeaf(),
                    'class'=> 'ztee-node',
                );
                if($node->isLeaf()){
                   // $nodeData['url'] = $node->url ;
                   // $nodeData['target'] = 'contentFrame';
                }

                $treeData[] = $nodeData ;
            }
        }
        Yii::$app->getResponse()->format = \yii\web\Response::FORMAT_JSON;

        return $treeData;

        /*
        $pId = "-1";
        if(array_key_exists( 'id',$_REQUEST)) {
            $pId=$_REQUEST['id'];
        }
        $pCount = "10";
        if(array_key_exists( 'count',$_REQUEST)) {
            $pCount=$_REQUEST['count'];
        }
        if ($pId==null || $pId=="") $pId = "0";
        if ($pCount==null || $pCount=="") $pCount = "10";

        $max = (int)$pCount;
        for ($i=1; $i<=$max; $i++) {
            $nId = $pId."_".$i;
            $nName = "tree".$nId;
            echo "{ id:'".$nId."',	name:'".$nName."'}";
            if ($i<$max) {
                echo ",";
            }

        }

//for ($i=1; $i<9999; $i++) {
//	for ($j=1; $j<999; $j++) {
//
//	}
//}


        /*
        if (Yii::app()->getRequest()->getIsAjaxRequest()) {
            $request = Yii::app()->getRequest();
            $parent = AdminMenu::model()->findByPk($request->getParam('key'));
            $descendants = $parent->children()->findAll();
             $dynaTreeData = array();
            foreach ($descendants as $child) {
                $dynaTreeData[] = array(
                    'title' => $child->label,
                    'key' => $child->id,
                    'isLazy' => $child->isLeaf() ? false : true,
                    'isFolder' => !$child->isLeaf(),
                );
            }
            echo CJSON::encode($dynaTreeData);
            die();
        }
        */
    }

    public function actionMoveNode()
    {
        if (Yii::app()->getRequest()->getIsAjaxRequest()) {
            $request = Yii::app()->getRequest();
            $sourceNode = AdminMenu::model()->findByPk($request->getParam('srcNode'));
            $refNode = AdminMenu::model()->findByPk($request->getParam('refNode'));
            $moveMode = $request->getParam('moveMode');

            $moveMethod = 'move' . $moveMode;
            if (method_exists($sourceNode->asa('nestedSet'), $moveMethod)) {
                if ($sourceNode->$moveMethod($refNode)) {
                    $res['error'] = true;
                } else {
                    $res['error'] = false;
                }
            } else {
                $res['error'] = false;
            }
            echo CJSON::encode($res);
            die();
        }
    }

    /**
     * 只有删除操作会动原始节点
     */
    public function actionDeleteNode()
    {
        if (Yii::app()->getRequest()->getIsAjaxRequest()) {
            $request = Yii::app()->getRequest();
            $node = AdminMenu::model()->findByPk($request->getParam('nodeId'));
            // var_dump($node);
            $success = $node->deleteNode();
            echo CJSON::encode(array('error' => $success));
            die();
        }
    }

    public function actionTest()
    {
        $topRoot = AdminMenu::model()->find('group_code=:group_code', array(':group_code' => 'sys_admin_menu_root'));

        $descendants = $topRoot->descendants()->findAll();

        $this->render('test', array('descendants' => $descendants));
    }

}