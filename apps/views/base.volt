<!DOCTYPE HTML>
<html>
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">
	{{ get_title() }}
	<!--css-->
    {{ stylesheet_link('file/bower_components/bootstrap/dist/css/bootstrap.min.css') }}
    {{ stylesheet_link('file/bower_components/metisMenu/dist/metisMenu.min.css') }}
    {{ stylesheet_link('file/dist/css/timeline.css') }}
    {{ stylesheet_link('file/dist/css/sb-admin-2.css') }}
    {{ stylesheet_link('file/bower_components/morrisjs/morris.css') }}
    {{ stylesheet_link('file/bower_components/font-awesome/css/font-awesome.min.css') }}
    <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
        <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->
</head>
<body>
	{% block content %}
    {% endblock %}
    <!-- jQuery -->
    {{ javascript_include('file/bower_components/jquery/dist/jquery.min.js') }}
    {{ javascript_include('file/bower_components/bootstrap/dist/js/bootstrap.min.js') }}
    {{ javascript_include('file/bower_components/metisMenu/dist/metisMenu.min.js') }}
    {{ javascript_include('file/bower_components/raphael/raphael-min.js') }}
    {{ javascript_include('file/bower_components/morrisjs/morris.min.js') }}
    {{ javascript_include('file/dist/js/sb-admin-2.js') }}
    <?php $this->assets->outputJs() ?>
</body>
</html>

