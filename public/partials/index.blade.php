<!-- index.html -->
<!DOCTYPE html PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
	<html ng-app="prpApp">
	<head>
            <title ng-bind="$global.routes.current().pageTitle()"></title>
		<base href="/">
	  <meta name="viewport" content="width=device-width, initial-scale=1">
	  <link rel="stylesheet" href="/assets/css/bootstrap.min.css" />
	  <link rel="stylesheet" href="/assets/css/bootstrap-flat.min.css" />
	  <link rel="stylesheet" href="//netdna.bootstrapcdn.com/font-awesome/4.0.0/css/font-awesome.css" />
	  <link rel="stylesheet" href="/assets/css/style.css" />
      <link href='http://fonts.googleapis.com/css?family=Open+Sans:800,400,600,300' rel='stylesheet' type='text/css'>
          
	</head>
        <body>
        <header>
	        <div class="container">
	        	<h2 class="logo">
	        	{{ $global.app.name }}
		        </h2>
		        <div class="pull-right">
		        	<ng-include src="$global.urls.template('shared.nav')"></ng-include>
		        </div>
		     </div>

        </header>
        
		<div id="main" class="container">

	        <h1 class="page-header">
	        	<i class="{{ $global.routes.current().icon() }}"></i>
			  	<span ng-bind="$global.routes.current().title()"> </span>
			  	<small ng-bind="$global.routes.current().breadCrumb()"></small>
	        </h1>
			<ng-include src="$global.urls.template('shared.alerts')"></ng-include>
			<div ui-view></div>
		</div>
	</body>
	<script type="text/javascript" src="/api/app-config.js"></script>
	[[ HTML::scripts("vendor")  ]]
	[[ HTML::scripts("lib")  ]]
	[[ HTML::scripts("app") ]]
	</html>
