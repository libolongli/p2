<?php
if($_POST){
	$html = <<<HTML
<?php
	config = array();
	config['username'] = "username@.qq.com";
	config['password']= "userpassword.qq.com";
	config['port'] = 25;
	config['host'] = "smtp.test.com";
?>
HTML;
	$filename = 'config.php';
	$smtp = explode('@',$_POST['username']);
	$smtp = explode('.',$smtp[1]);
	$strsmtp = "smtp.{$smtp[0]}.com";
	$html = str_replace('config','$config',$html);
	$html = str_replace('username@.qq.com',$_POST['username'],$html);
	$html = str_replace('userpassword.qq.com',$_POST['password'],$html);
	$html = str_replace('smtp.test.com',$strsmtp,$html);
	if(file_exists($filename)){
		unlink($filename);
	}
	file_put_contents($filename,$html);
	echo "配置成功!请访问send.php进行发送邮件!";exit;
}
	$html = <<<HTML
	<form  method = 'POST' action= ''>
		<table>
			<tr>
				<td>配置邮箱:</td>
				<td><input type='input' name='username' value='请输入邮箱' /></td>
			</tr>
			<tr>
				<td>您的密码:</td>
				<td><input type='password' name='password'  /></td>
			</tr>
			<tr colspan = '2'>
				<td><input type='submit' value='提交' /></td>
			</tr>
		</table>
	</form>
HTML;
echo $html;
 ?>
 