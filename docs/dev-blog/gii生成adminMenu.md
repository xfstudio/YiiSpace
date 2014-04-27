## 准备后台的菜单用表来管理
-----------

## 控制器的url 路由跟yii1.x不一样了
--------------
这个坑啊 找了一个多小时 总找不出原因  ！
yii1.x 复合名称的控制器id 默认路由规则是：  XxxYyyController ===>  xxxYyy/..
yii2.x 不同于1的是 控制器id变为  XxxYyyController ===>  xxx-yyy

gii 在生crud时 跟yii1不同的是 还会生一个专用于search的模型
原先的admin视图 跟index 视图合一了 在生成时可选 gridView还是listView
