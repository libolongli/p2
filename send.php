<?php
	if($_POST){
		require 'SendEmail.php';	
		$email = new SendEmail();	
		$email->sendEmail($_POST['email'],$_POST['subject'],$_POST['content']);
		exit('发送成功!');
	}
	$html = <<<HTML
	<form  method = 'POST' action= ''>
		<table>
			<tr>
				<td>收件人邮箱:</td>
				<td><input type='input' name='email'  /></td>
			</tr>
			<tr>
				<td>主题:</td>
				<td><input type='input' name='subject'  /></td>
			</tr>
			<tr>
				<td>发送内容:</td>
				<td>
					<textarea rows="3" cols="20" name ="content">
						
					</textarea>
				</td>
			</tr>
			<tr colspan = '2'>
				<td><input type='submit' value='提交' /></td>
			</tr>
		</table>
	</form>
HTML;
echo $html;exit;
	
	