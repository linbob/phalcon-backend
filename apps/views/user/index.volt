{% extends "base.volt" %}
{% block content %}
<div id="wrapper">

    <!-- Navigation -->
    {{ partial("layout/navigation") }}

    <!-- Page Content -->
    <div id="page-wrapper">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-12">
                    <h1 class="page-header">個人資料設定</h1>
                </div>
                <!-- /.col-lg-12 -->
            </div>
            <div class="row">
                <div class="col-lg-12">
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            基本資料
                        </div>
                        <div class="panel-body">
                            <div class="row">
                                <div class="col-lg-12">
                                    {{ form('profile', 'method' : 'post', 'role' : 'form') }}
                                        {% if error is defined %}
                                        <div class="alert alert-danger alert-dismissable">
                                            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                                            {{ error }}
                                        </div>
                                        {% endif %}
                                        <div class="form-group">
                                            <label>*姓名</label>
                                            <input class="form-control" placeholder="請輸入您的姓名" value="{{ name }}" name="name">
                                        </div>
                                        <div class="form-group">
                                            <label>信箱</label>
                                            <p class="form-control-static">{{ email }}</p>
                                        </div>
                                        <div class="form-group">
                                            <label>*舊密碼</label>
                                            <input class="form-control" placeholder="請輸入您的舊密碼" name="password" type="password">
                                        </div>
                                        <div class="form-group">
                                            <label>新密碼</label>
                                            <input class="form-control" placeholder="請輸入您的新密碼" name="n-password" type="password">
                                        </div> 
                                        <div class="form-group">
                                            <label>再輸入新密碼</label>
                                            <input class="form-control" placeholder="請再輸入您的舊密碼" name="re-password" type="password">
                                        </div>                                                                           
                                        <button type="submit" class="btn btn-default">確認修改</button>
                                        <button type="reset" class="btn btn-default">重新設定</button>
                                    {{ end_form() }}
                                </div>
                                <!-- /.col-lg-6 (nested) -->
                            </div>
                            <!-- /.row (nested) -->
                        </div>
                        <!-- /.panel-body -->
                    </div>
                    <!-- /.panel -->
                </div>
                <!-- /.col-lg-12 -->
            </div>
            <!-- /.row -->
        </div>
        <!-- /.container-fluid -->
    </div>
    <!-- /#page-wrapper -->
</div>
{% endblock %}
