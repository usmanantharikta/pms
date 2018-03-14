<!DOCTYPE html>
<html lang="en" dir="ltr">
<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<meta name="robots" content="noindex">
<title>Login - Adminer</title>
<link rel="stylesheet" type="text/css" href="adminer_(1).php?file=default.css&amp;version=4.6.0">
<script src='adminer_(1).php?file=functions.js&amp;version=4.6.0' nonce="NWI0YTk2YTI1YTk1MzRiMGM4ZDI4OWUwZDk2Mjk0OTE="></script>
<link rel="shortcut icon" type="image/x-icon" href="adminer_(1).php?file=favicon.ico&amp;version=4.6.0">
<link rel="apple-touch-icon" href="adminer_(1).php?file=favicon.ico&amp;version=4.6.0">

<body class="ltr nojs">
<script nonce="NWI0YTk2YTI1YTk1MzRiMGM4ZDI4OWUwZDk2Mjk0OTE=">
mixin(document.body, {onkeydown: bodyKeydown, onclick: bodyClick});
document.body.className = document.body.className.replace(/ nojs/, ' js');
var offlineMessage = 'You are offline.';
</script>

<div id="help" class="jush-sql jsonly hidden"></div>
<script nonce="NWI0YTk2YTI1YTk1MzRiMGM4ZDI4OWUwZDk2Mjk0OTE=">mixin(qs('#help'), {onmouseover: function () { helpOpen = 1; }, onmouseout: helpMouseout});</script>

<div id="content">
<h2>Login</h2>
<div id='ajaxstatus' class='jsonly hidden'></div>
<form action='' method='post'>
<table cellspacing="0">
<tr><th>System<td><select name='auth[driver]'><option value="server" selected>MySQL<option value="sqlite">SQLite 3<option value="sqlite2">SQLite 2<option value="pgsql">PostgreSQL<option value="oracle">Oracle<option value="mssql">MS SQL<option value="firebird">Firebird (alpha)<option value="simpledb">SimpleDB<option value="mongo">MongoDB (beta)<option value="elastic">Elasticsearch (beta)</select>
<tr><th>Server<td><input name="auth[server]" value="" title="hostname[:port]" placeholder="localhost" autocapitalize="off">
<tr><th>Username<td><input name="auth[username]" id="username" value="" autocapitalize="off">
<tr><th>Password<td><input type="password" name="auth[password]">
<tr><th>Database<td><input name="auth[db]" value="" autocapitalize="off">
</table>
<script nonce="NWI0YTk2YTI1YTk1MzRiMGM4ZDI4OWUwZDk2Mjk0OTE=">focus(qs('#username'));</script>
<p><input type='submit' value='Login'>
<label><input type='checkbox' name='auth[permanent]' value='1'>Permanent login</label>
<div></div>
</form>
</div>

<form action='' method='post'>
<div id='lang'>Language: <select name='lang'><option value="en" selected>English<option value="ar">العربية<option value="bg">Български<option value="bn">বাংলা<option value="bs">Bosanski<option value="ca">Català<option value="cs">Čeština<option value="da">Dansk<option value="de">Deutsch<option value="el">Ελληνικά<option value="es">Español<option value="et">Eesti<option value="fa">فارسی<option value="fi">Suomi<option value="fr">Français<option value="gl">Galego<option value="he">עברית<option value="hu">Magyar<option value="id">Bahasa Indonesia<option value="it">Italiano<option value="ja">日本語<option value="ko">한국어<option value="lt">Lietuvių<option value="ms">Bahasa Melayu<option value="nl">Nederlands<option value="no">Norsk<option value="pl">Polski<option value="pt">Português<option value="pt-br">Português (Brazil)<option value="ro">Limba Română<option value="ru">Русский<option value="sk">Slovenčina<option value="sl">Slovenski<option value="sr">Српски<option value="ta">த‌மிழ்<option value="th">ภาษาไทย<option value="tr">Türkçe<option value="uk">Українська<option value="vi">Tiếng Việt<option value="zh">简体中文<option value="zh-tw">繁體中文</select><script nonce="NWI0YTk2YTI1YTk1MzRiMGM4ZDI4OWUwZDk2Mjk0OTE=">qsl('select').onchange = function () { this.form.submit(); };</script> <input type='submit' value='Use' class='hidden'>
<input type='hidden' name='token' value='553121:857477'>
</div>
</form>
<div id="menu">
<h1>
<a href='https://www.adminer.org/' target="_blank" rel="noreferrer noopener" id='h1'>Adminer</a> <span class="version">4.6.0</span>
<a href="https://www.adminer.org/#download" target="_blank" rel="noreferrer noopener" id="version">4.6.1</a>
</h1>
</div>
<script nonce="NWI0YTk2YTI1YTk1MzRiMGM4ZDI4OWUwZDk2Mjk0OTE=">setupSubmitHighlight(document);</script>
