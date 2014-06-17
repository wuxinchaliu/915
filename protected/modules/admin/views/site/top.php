<div class="navbar-header">
    <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".sidebar-collapse">
        <span class="sr-only">Toggle navigation</span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
    </button>
    <a class="navbar-brand" href="index">IT915--后台管理系统</a>
</div>
<!-- /.navbar-header -->

<ul class="nav navbar-top-links navbar-right">

<!-- /.dropdown -->
<li class="dropdown">
    <a class="dropdown-toggle" data-toggle="dropdown" href="#">
        <i class="fa fa-user fa-fw"></i>  <i class="fa fa-caret-down"></i>
    </a>
    <ul class="dropdown-menu dropdown-user">
        <li><a href="/admin/user/view/"><i class="fa fa-user fa-fw"></i> <?php echo Yii::app()->user->id;?></a>
        </li>
        <li><a href="/admin/user/updatePassword"><i class="fa fa-gear fa-fw"></i> 修改密码</a>
        </li>
        <li class="divider"></li>
        <li><a href="/admin/site/logout"><i class="fa fa-sign-out fa-fw"></i> 退出 </a>
        </li>
    </ul>
    <!-- /.dropdown-user -->
</li>
<!-- /.dropdown -->
</ul>