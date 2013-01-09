<?
 $lang = array(
 	"%home%", "Домой",
 	"%albums%", "Альбомы",
 	"%tvonline%", "ТВ-Онлайн",
 	"%messages%", "Сообщения",
 	"%login%", "Войти",
 	"%logout%", "Выйти",
 	"%registration%", "Регистрация",
 );
 
 for($i=0;$i<sizeof($lang);$i+=2) {
 	$ii = $i+1;
 	if (isset($output)) $output = str_replace($lang[$i],$lang[$ii],$output);
 	if (isset($menu)) $menu = str_replace($lang[$i],$lang[$ii],$menu);
 }
