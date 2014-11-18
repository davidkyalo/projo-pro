<?php

HTML::macro('scripts', function($type)
{
	$html = '';
	$dir = Config::get('view.js_path') . $type . '/';
	
	if($scripts = Config::get('javascript.files.'. $type)){
		foreach ($scripts as $script){
			$path = $dir . $script;
			$html .= '<script type="text/javascript" src="' . $path . '"></script>';
		}
	}
    echo $html;
});

HTML::macro('jsConfig', function(){
	$config = Config::get('javascript.config');
	$config = json_encode($config);
	echo '<script type="text/javascript">
				var $appConfig = '. $config .';
			</script>
			';
});