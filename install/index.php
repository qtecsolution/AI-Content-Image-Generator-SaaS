<?php
	error_reporting(0);
	
	function writeConfig($key,$value){
		$configUrl = "../core/config/system.php";
		$config = require $configUrl;
		if(isset($config[$key])){
			$config[$key] = $value;
		}
		$content = "<?php\n\nreturn " . var_export($config,true) . ";\n";
		file_put_contents($configUrl, $content);
	}
	
	$ENVURL = "../core/.env";
	function readEnv($key){
		global $ENVURL;
		$envFile = file_get_contents($ENVURL);
		$envVars = explode("\n", $envFile);
		foreach ($envVars as $envVar) {
			$envVar = explode('=', $envVar);
			if (count($envVar) == 2 && $envVar[0] === $key) {
				return $envVar[1];
			}
		}
		return "";
	}
	function writeEnv($key,$value){
		global $ENVURL;
		$envFile = file_get_contents($ENVURL);
		$envVars = explode("\n", $envFile);

		foreach ($envVars as $index => $envVar) {
			$envVar = explode('=', $envVar);
			if (count($envVar) == 2 && $envVar[0] === $key) {
				$envVars[$index] = $key . '="' . $value.'"';
			}
		}

		$envFile = implode("\n", $envVars);
		file_put_contents($ENVURL, $envFile);
	}
	//check if already installed
	if(readEnv("INSTALLED")==1 || readEnv("INSTALLED")=='"1"'){
		$protocol = !empty($_SERVER['HTTPS']) && $_SERVER['HTTPS'] !== 'off' ? 'https' : 'http';
		$domain = $_SERVER['SERVER_NAME'];
		$port = $_SERVER['SERVER_PORT'] != '80' && $_SERVER['SERVER_PORT'] != '443' ? ':' . $_SERVER['SERVER_PORT'] : '';
		$root_url = $protocol . '://' . $domain . $port;
		header("Location: $root_url");
		//echo $root_url;
		exit;
	}
	function envSetup($allData){
		try {
			foreach($allData as $key => $value){
				if($key=='db_host'){
					writeEnv("DB_HOST",$value);
				}
				if($key=='db_name'){
					writeEnv("DB_DATABASE",$value);
				}
				if($key=='db_user'){
					writeEnv("DB_USERNAME",$value);
				}
				if($key=='db_pass'){
					writeEnv("DB_PASSWORD",$value);
				}
				if($key=='url'){
					writeEnv("APP_URL",$value);
				}
				if($key=='app_name'){
					writeEnv("APP_NAME",$value);
					writeEnv("APP_ENV","production");
					writeConfig("name",$value);
					writeConfig("type_name",$value);
					writeConfig("demo",false);
				}
				writeEnv("INSTALLED",1);
			}
			return true;
		} catch (Exception $e) {
			return false;
		}
		
		
	}
	function isExtensionAvailable($name)
	{
		if (!extension_loaded($name)) {
			$response = false;
		} else {
			$response = true;
		}
		return $response;
	}
	function checkFolderPerm($name)
	{
		$perm = substr(sprintf('%o', fileperms($name)), -4);
		if ($perm >= '0775') {
			$response = true;
		} else {
			$response = false;
		}
		return $response;
	}
	function tableRow($name, $details, $status)
	{
		if ($status == '1') {
			$pr = '<i class="fas fa-check"></i>';
		} else {
			$pr = '<i class="fas fa-times"></i>';
		}
		echo "<tr><td>$name</td><td>$details</td><td>$pr</td></tr>";
	}
	function getWebURL()
	{
		$base_url = (isset($_SERVER['HTTPS']) &&
			$_SERVER['HTTPS'] != 'off') ? 'https://' : 'http://';
		$tmpURL = dirname(__FILE__);
		$tmpURL = str_replace(chr(92), '/', $tmpURL);
		$tmpURL = str_replace($_SERVER['DOCUMENT_ROOT'], '', $tmpURL);
		$tmpURL = ltrim($tmpURL, '/');
		$tmpURL = rtrim($tmpURL, '/');
		$tmpURL = str_replace('install', '', $tmpURL);
		$base_url .= $_SERVER['HTTP_HOST'] . '/' . $tmpURL;
		if (substr("$base_url", -1 == "/")) {
			$base_url = substr("$base_url", 0, -1);
		}
		return $base_url;
	}
	function curlContent($add)
	{
		$ch = curl_init();
		curl_setopt($ch, CURLOPT_AUTOREFERER, TRUE);
		curl_setopt($ch, CURLOPT_HEADER, 0);
		curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
		curl_setopt($ch, CURLOPT_URL, $add);
		curl_setopt($ch, CURLOPT_FOLLOWLOCATION, TRUE);
		$res = curl_exec($ch);
		curl_close($ch);
		return $res;
	}
	function getStatus($arr)
	{
		$url = 'https://license.qtecsolution.net/api';
		$arr['product'] = 'creaify';
		$call = $url . "?" . http_build_query($arr);
		return curlContent($call);
	}
	function sendAcknoledgement($val)
	{
		$call = 'https://license.qtecsolution.net/done/' . $val->installcode;
		return curlContent($call);
	}
	function replaceData($val, $arr)
	{
		foreach ($arr as $key => $value) {
			$val = str_replace('{{' . $key . '}}', $value, $val);
		}
		return $val;
	}
	function setDataValue($val, $loc)
	{
		$file = fopen($loc, 'w');
		fwrite($file, $val);
		fclose($file);
	}
	function sysInstall($sr, $pt)
	{
		$pt['key'] = base64_encode(random_bytes(32));
		setDataValue(replaceData($sr->data->body, $pt), $sr->data->location);
		return true;
	}
	function importDatabase($pt)
	{
		$db = new PDO("mysql:host=$pt[db_host];dbname=$pt[db_name]", $pt['db_user'], $pt['db_pass']);
		$query = file_get_contents("database.sql");
		$stmt = $db->prepare($query);
		if ($stmt->execute())
			return true;
		else
			return false;
	}
	function setAdminEmail($pt)
	{
		$db = new PDO("mysql:host=$pt[db_host];dbname=$pt[db_name]", $pt['db_user'], $pt['db_pass']);
		$res = $db->query("UPDATE users SET email='" . $pt['email'] . "', name='" . $pt['admin_user'] . "', password='" . password_hash($pt['admin_pass'], PASSWORD_DEFAULT) . "' WHERE id=1");
		if ($res) {
			return true;
		} else {
			return false;
		}
	}
	//------------->> Extension & Permission
	$requiredServerExtensions = [
			'Fileinfo','JSON', 'Mbstring', 'OpenSSL', 'PDO', 'pdo_mysql', 'cURL',  'GD'
	];

	$folderPermissions = [
		'../core/bootstrap/cache/', '../core/storage/', '../core/storage/app/', '../core/storage/framework/', '../core/storage/logs/'
	];
	//------------->> Extension & Permission
?>
<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<meta http-equiv="X-UA-Compatible" content="ie=edge">
	<title>Easy Installer by Creaify</title>
	<link rel="stylesheet" href="assets/css/bootstrap.min.css">
	<link rel="stylesheet" href="assets/css/install.min.css">
	<link rel="stylesheet" href="assets/css/fontawesome.min.css">
	<link rel="shortcut icon" href="assets/fav.png" type="image/x-icon">
</head>

<body>
	<header class="section-bg py-2 text-center">
		<div class="container h-100 d-flex justify-content-center align-items-center">
			<div class="d-flex justify-content-center align-items-center h-100 py-2">
				<img src="assets/images/logo.svg" alt="logo">
			</div>
		</div>
	</header>
	<div class="installation-section padding-bottom padding-top">
		<div class="container">
			<?php
			if (isset($_GET['action'])) {
				$action = $_GET['action'];
			} else {
				$action = "";
			}

			if ($action == 'complete') {
			?>
				<div class="installation-wrapper bg-transparent pt-2 pt-md-5">
					<ul class="installation-menu">
						<li class="steps done">
							<div class="thumb">
								<span>
								<svg width="41" height="41" viewBox="0 0 41 41" fill="none" xmlns="http://www.w3.org/2000/svg">
									<path d="M10.2493 10.25H10.2664M10.2493 30.75H10.2664M6.83268 3.41669H34.166C36.053 3.41669 37.5827 4.94638 37.5827 6.83335V13.6667C37.5827 15.5537 36.053 17.0834 34.166 17.0834H6.83268C4.94571 17.0834 3.41602 15.5537 3.41602 13.6667V6.83335C3.41602 4.94638 4.94571 3.41669 6.83268 3.41669ZM6.83268 23.9167H34.166C36.053 23.9167 37.5827 25.4464 37.5827 27.3334V34.1667C37.5827 36.0537 36.053 37.5834 34.166 37.5834H6.83268C4.94571 37.5834 3.41602 36.0537 3.41602 34.1667V27.3334C3.41602 25.4464 4.94571 23.9167 6.83268 23.9167Z" stroke="white" stroke-width="4" stroke-linecap="round" stroke-linejoin="round"/>
								</svg>

								</span>
							</div>
							<h5 class="content">Server<br>Requirements</h5>
						</li>
						<li class="steps done">
							<div class="thumb">
							<span>
								<svg width="33" height="39" viewBox="0 0 33 39" fill="none" xmlns="http://www.w3.org/2000/svg">
									<path d="M19.9154 2.41669H6.2487C5.34254 2.41669 4.4735 2.77666 3.83275 3.41741C3.192 4.05815 2.83203 4.9272 2.83203 5.83335V33.1667C2.83203 34.0728 3.192 34.9419 3.83275 35.5826C4.4735 36.2234 5.34254 36.5834 6.2487 36.5834H26.7487C27.6549 36.5834 28.5239 36.2234 29.1646 35.5826C29.8054 34.9419 30.1654 34.0728 30.1654 33.1667V12.6667M19.9154 2.41669L30.1654 12.6667M19.9154 2.41669V12.6667H30.1654M23.332 21.2084H9.66536M23.332 28.0417H9.66536M13.082 14.375H9.66536" stroke="white" stroke-width="4" stroke-linecap="round" stroke-linejoin="round"/>
								</svg>

								</span>
							</div>
							<h5 class="content">File<br>Permissions</h5>
						</li>
						<li class="steps done">
							<div class="thumb">
							<span>
									<svg width="35" height="39" viewBox="0 0 35 39" fill="none" xmlns="http://www.w3.org/2000/svg">
										<path d="M32.875 7.54175C32.875 10.3722 25.9914 12.6667 17.5 12.6667C9.00862 12.6667 2.125 10.3722 2.125 7.54175M32.875 7.54175C32.875 4.71129 25.9914 2.41675 17.5 2.41675C9.00862 2.41675 2.125 4.71129 2.125 7.54175M32.875 7.54175V31.4584C32.875 34.2942 26.0417 36.5834 17.5 36.5834C8.95833 36.5834 2.125 34.2942 2.125 31.4584V7.54175M32.875 19.5001C32.875 22.3359 26.0417 24.6251 17.5 24.6251C8.95833 24.6251 2.125 22.3359 2.125 19.5001" stroke="white" stroke-width="4" stroke-linecap="round" stroke-linejoin="round"/>
									</svg>
								</span>
							</div>
							<h5 class="content">Installation<br>Information</h5>
						</li>
						<li class="steps running">
							<div class="thumb">
							<span>
									<svg width="39" height="39" viewBox="0 0 39 39" fill="none" xmlns="http://www.w3.org/2000/svg">
										<path d="M36.5827 17.9283V19.5C36.5806 23.1839 35.3877 26.7684 33.182 29.7189C30.9762 32.6695 27.8758 34.828 24.3431 35.8725C20.8104 36.917 17.0347 36.7916 13.5791 35.5149C10.1235 34.2382 7.17313 31.8787 5.16807 28.7883C3.16301 25.6979 2.21066 22.0421 2.45305 18.3662C2.69543 14.6903 4.11958 11.1912 6.51308 8.3908C8.90658 5.59041 12.1412 3.63875 15.7345 2.82689C19.3278 2.01503 23.0873 2.38646 26.4523 3.88581M36.5827 5.83331L19.4994 22.9337L14.3744 17.8087" stroke="white" stroke-width="4" stroke-linecap="round" stroke-linejoin="round"/>
									</svg>

								</span>
							</div>
							<h5 class="content">Complete<br>Installation</h5>
						</li>
					</ul>
				</div>
				<div class="installation-wrapper">
					<div class="install-content-area">
						<div class="install-item">
							<h3 class="title text-center">Complete Installation</h3>
							<div class="box-item">
								<div class="success-area text-center">
									<?php
									if ($_POST) {
										$alldata = $_POST;
										$db_name = $_POST['db_name'];
										$db_host = $_POST['db_host'];
										$db_user = $_POST['db_user'];
										$db_pass = $_POST['db_pass'];
										
										if(!importDatabase($alldata)){
											echo "<h3 class='text-danger'>EasyInstaller Unable to install your system. Please Check Your Database Credentials!<h3>";
										}else{
											if(!envSetup($alldata)){
												echo "<h3 class='text-danger'>An unexpected error occurred with the installation. Please Check Your All files & try again.<h3>";
											}else{
												echo '<h2 class="text-success text-uppercase mb-5">Your system has been installed successfully!</h2>';
												if(setAdminEmail($alldata)){
													echo '<p class="text-success warning">Admin credential has been set successfully!</p>';
												}else{
													echo '<p class="text-warning warning">EasyInstaller unable to set the email address of admin.</p>';
												}
												echo '<div class="warning">
												<p class="text-danger lead my-3">Please delete the "install" folder from the server.</p>
												<p class="text-warning lead my-3">Please change the admin password as soon as possible.</p>
												</div> <br>';
												echo '
												<div class="warning">
												<a href="'.getWebURL().'" class="theme-button choto">Go to website</a>
												<a href="'.getWebURL().'/home" class="theme-button choto">Go to Admin Panel</a>
												</div>';
											}
										}
										
									}
									?>
								</div>
							</div>
						</div>
					</div>
				</div>
			<?php
			} elseif ($action == 'info') {
			?>
				<div class="installation-wrapper bg-transparent pt-md-5">
					<ul class="installation-menu ">
						<li class="steps done">
							<div class="thumb">
								<span>
								<svg width="41" height="41" viewBox="0 0 41 41" fill="none" xmlns="http://www.w3.org/2000/svg">
									<path d="M10.2493 10.25H10.2664M10.2493 30.75H10.2664M6.83268 3.41669H34.166C36.053 3.41669 37.5827 4.94638 37.5827 6.83335V13.6667C37.5827 15.5537 36.053 17.0834 34.166 17.0834H6.83268C4.94571 17.0834 3.41602 15.5537 3.41602 13.6667V6.83335C3.41602 4.94638 4.94571 3.41669 6.83268 3.41669ZM6.83268 23.9167H34.166C36.053 23.9167 37.5827 25.4464 37.5827 27.3334V34.1667C37.5827 36.0537 36.053 37.5834 34.166 37.5834H6.83268C4.94571 37.5834 3.41602 36.0537 3.41602 34.1667V27.3334C3.41602 25.4464 4.94571 23.9167 6.83268 23.9167Z" stroke="white" stroke-width="4" stroke-linecap="round" stroke-linejoin="round"/>
								</svg>

								</span>
							</div>
							<h5 class="content">Server<br>Requirements</h5>
						</li>
						<li class="steps done">
							<div class="thumb">
								<span>
								<svg width="33" height="39" viewBox="0 0 33 39" fill="none" xmlns="http://www.w3.org/2000/svg">
									<path d="M19.9154 2.41669H6.2487C5.34254 2.41669 4.4735 2.77666 3.83275 3.41741C3.192 4.05815 2.83203 4.9272 2.83203 5.83335V33.1667C2.83203 34.0728 3.192 34.9419 3.83275 35.5826C4.4735 36.2234 5.34254 36.5834 6.2487 36.5834H26.7487C27.6549 36.5834 28.5239 36.2234 29.1646 35.5826C29.8054 34.9419 30.1654 34.0728 30.1654 33.1667V12.6667M19.9154 2.41669L30.1654 12.6667M19.9154 2.41669V12.6667H30.1654M23.332 21.2084H9.66536M23.332 28.0417H9.66536M13.082 14.375H9.66536" stroke="white" stroke-width="4" stroke-linecap="round" stroke-linejoin="round"/>
								</svg>

								</span>
							</div>
							<h5 class="content">File<br>Permissions</h5>
						</li>
						<li class="steps running">
							<div class="thumb">
								<span>
									<svg width="35" height="39" viewBox="0 0 35 39" fill="none" xmlns="http://www.w3.org/2000/svg">
										<path d="M32.875 7.54175C32.875 10.3722 25.9914 12.6667 17.5 12.6667C9.00862 12.6667 2.125 10.3722 2.125 7.54175M32.875 7.54175C32.875 4.71129 25.9914 2.41675 17.5 2.41675C9.00862 2.41675 2.125 4.71129 2.125 7.54175M32.875 7.54175V31.4584C32.875 34.2942 26.0417 36.5834 17.5 36.5834C8.95833 36.5834 2.125 34.2942 2.125 31.4584V7.54175M32.875 19.5001C32.875 22.3359 26.0417 24.6251 17.5 24.6251C8.95833 24.6251 2.125 22.3359 2.125 19.5001" stroke="white" stroke-width="4" stroke-linecap="round" stroke-linejoin="round"/>
									</svg>
								</span>
							</div>
							<h5 class="content">Installation<br>Information</h5>
						</li>
						<li class="steps">
							<div class="thumb">
								<span>
									<svg width="39" height="39" viewBox="0 0 39 39" fill="none" xmlns="http://www.w3.org/2000/svg">
										<path d="M36.5827 17.9283V19.5C36.5806 23.1839 35.3877 26.7684 33.182 29.7189C30.9762 32.6695 27.8758 34.828 24.3431 35.8725C20.8104 36.917 17.0347 36.7916 13.5791 35.5149C10.1235 34.2382 7.17313 31.8787 5.16807 28.7883C3.16301 25.6979 2.21066 22.0421 2.45305 18.3662C2.69543 14.6903 4.11958 11.1912 6.51308 8.3908C8.90658 5.59041 12.1412 3.63875 15.7345 2.82689C19.3278 2.01503 23.0873 2.38646 26.4523 3.88581M36.5827 5.83331L19.4994 22.9337L14.3744 17.8087" stroke="white" stroke-width="4" stroke-linecap="round" stroke-linejoin="round"/>
									</svg>

								</span>
							</div>
							<h5 class="content">Complete<br>Installation</h5>
						</li>
					</ul>
				</div>
				<div class="installation-wrapper">
					<div class="install-content-area">
						<div class="install-item">
							<h3 class="title text-center">Installation Information</h3>
							<div class="box-item">
								<form action="?action=complete" method="post" class="information-form-area mb--20">
									<div class="info-item">
										<h5 class="form-label">Application URL &amp; Name</h5>
										<div class="row">
											<div class="information-form-group col-sm-6">
											<input name="url" value="<?php echo getWebURL(); ?>" type="text" required>
											</div>
											<div class="information-form-group col-sm-6">
												<input type="text" name="app_name" placeholder="Application Name" required>
											</div>
										</div>
									</div>
									<div class="info-item">
										<h5 class="form-label">Database Details</h5>
										<div class="row">
											<div class="information-form-group col-sm-6">
												<input type="text" name="db_name" placeholder="Database Name" required>
											</div>
											<div class="information-form-group col-sm-6">
												<input type="text" name="db_host" value="127.0.0.1" placeholder="Database Host" required>
											</div>
											<div class="information-form-group col-sm-6">
												<input type="text" name="db_user" placeholder="Database User" required>
											</div>
											<div class="information-form-group col-sm-6">
												<input type="text" name="db_pass" placeholder="Database Password">
											</div>
										</div>
									</div>
									<div class="info-item">
										<h5 class="form-label">Admin Credential</h5>
										<div class="row">
											<div class="information-form-group col-lg-3 col-sm-6">
												<label class="form-label">Username</label>
												<input name="admin_user" type="text" placeholder="Admin Username" required>
											</div>
											<div class="information-form-group col-lg-3 col-sm-6">
												<label class="form-label">Password</label>
												<input name="admin_pass" type="password" placeholder="Admin Password" required>
											</div>
											<div class="information-form-group col-lg-6">
												<label class="form-label">Email Address</label>
												<input name="email" placeholder="Your Email address" type="email" required>
											</div>
										</div>
									</div>
									<div class="info-item">
										<div class="information-form-group text-right">
											<button type="submit" class="theme-button choto">Install Now</button>
										</div>
									</div>
								</form>
							</div>
						</div>
					</div>
				</div>
			<?php
			} elseif ($action == 'file') {
			?>
				<div class="installation-wrapper pt-md-5">
					<ul class="installation-menu ">
						<li class="steps done">
							<div class="thumb">
							<span>
								<svg width="41" height="41" viewBox="0 0 41 41" fill="none" xmlns="http://www.w3.org/2000/svg">
									<path d="M10.2493 10.25H10.2664M10.2493 30.75H10.2664M6.83268 3.41669H34.166C36.053 3.41669 37.5827 4.94638 37.5827 6.83335V13.6667C37.5827 15.5537 36.053 17.0834 34.166 17.0834H6.83268C4.94571 17.0834 3.41602 15.5537 3.41602 13.6667V6.83335C3.41602 4.94638 4.94571 3.41669 6.83268 3.41669ZM6.83268 23.9167H34.166C36.053 23.9167 37.5827 25.4464 37.5827 27.3334V34.1667C37.5827 36.0537 36.053 37.5834 34.166 37.5834H6.83268C4.94571 37.5834 3.41602 36.0537 3.41602 34.1667V27.3334C3.41602 25.4464 4.94571 23.9167 6.83268 23.9167Z" stroke="white" stroke-width="4" stroke-linecap="round" stroke-linejoin="round"/>
								</svg>

								</span>
							</div>
							<h5 class="content">Server<br>Requirements</h5>
						</li>
						<li class="steps running">
							<div class="thumb">
								<span>
									<svg width="33" height="39" viewBox="0 0 33 39" fill="none" xmlns="http://www.w3.org/2000/svg">
										<path d="M19.9154 2.41669H6.2487C5.34254 2.41669 4.4735 2.77666 3.83275 3.41741C3.192 4.05815 2.83203 4.9272 2.83203 5.83335V33.1667C2.83203 34.0728 3.192 34.9419 3.83275 35.5826C4.4735 36.2234 5.34254 36.5834 6.2487 36.5834H26.7487C27.6549 36.5834 28.5239 36.2234 29.1646 35.5826C29.8054 34.9419 30.1654 34.0728 30.1654 33.1667V12.6667M19.9154 2.41669L30.1654 12.6667M19.9154 2.41669V12.6667H30.1654M23.332 21.2084H9.66536M23.332 28.0417H9.66536M13.082 14.375H9.66536" stroke="white" stroke-width="4" stroke-linecap="round" stroke-linejoin="round"/>
									</svg>

									</span>
							</div>
							<h5 class="content">File<br>Permissions</h5>
						</li>
						<li class="steps">
							<div class="thumb">
							<span>
									<svg width="35" height="39" viewBox="0 0 35 39" fill="none" xmlns="http://www.w3.org/2000/svg">
										<path d="M32.875 7.54175C32.875 10.3722 25.9914 12.6667 17.5 12.6667C9.00862 12.6667 2.125 10.3722 2.125 7.54175M32.875 7.54175C32.875 4.71129 25.9914 2.41675 17.5 2.41675C9.00862 2.41675 2.125 4.71129 2.125 7.54175M32.875 7.54175V31.4584C32.875 34.2942 26.0417 36.5834 17.5 36.5834C8.95833 36.5834 2.125 34.2942 2.125 31.4584V7.54175M32.875 19.5001C32.875 22.3359 26.0417 24.6251 17.5 24.6251C8.95833 24.6251 2.125 22.3359 2.125 19.5001" stroke="white" stroke-width="4" stroke-linecap="round" stroke-linejoin="round"/>
									</svg>
								</span>
							</div>
							<h5 class="content">Installation<br>Information</h5>
						</li>
						<li class="steps">
							<div class="thumb">
							<span>
									<svg width="39" height="39" viewBox="0 0 39 39" fill="none" xmlns="http://www.w3.org/2000/svg">
										<path d="M36.5827 17.9283V19.5C36.5806 23.1839 35.3877 26.7684 33.182 29.7189C30.9762 32.6695 27.8758 34.828 24.3431 35.8725C20.8104 36.917 17.0347 36.7916 13.5791 35.5149C10.1235 34.2382 7.17313 31.8787 5.16807 28.7883C3.16301 25.6979 2.21066 22.0421 2.45305 18.3662C2.69543 14.6903 4.11958 11.1912 6.51308 8.3908C8.90658 5.59041 12.1412 3.63875 15.7345 2.82689C19.3278 2.01503 23.0873 2.38646 26.4523 3.88581M36.5827 5.83331L19.4994 22.9337L14.3744 17.8087" stroke="white" stroke-width="4" stroke-linecap="round" stroke-linejoin="round"/>
									</svg>

								</span>
							</div>
							<h5 class="content">Complete<br>Installation</h5>
						</li>
					</ul>
				</div>
				<div class="installation-wrapper">
					<div class="install-content-area">
						<div class="install-item">
							<h3 class="title text-center">File Permissions</h3>
							<div class="box-item">
								<div class="item table-area">
									<table class="requirment-table">
										<?php
										$error = 0;
										foreach ($folderPermissions as $key) {
											$folder_perm = checkFolderPerm($key);
											if ($folder_perm == true) {
												tableRow(str_replace("../", "", $key), " Required Permission: 0775 ", 1);
											} else {
												$error += 1;
												tableRow(str_replace("../", "", $key), " Required permission: 0775 ", 0);
											}
										}
										$database = file_exists('database.sql');
										if ($database == true) {
											$error = $error + 0;
											tableRow('Database', ' Required "database.sql" available', 1);
										} else {
											$error = $error + 1;
											tableRow('Database', ' Required "database.sql" available', 0);
										}
										$database = file_exists('../.htaccess');
										if ($database == true) {
											$error = $error + 0;
											tableRow('.htaccess', '  Required ".htaccess" available', 1);
										} else {
											$error = $error + 1;
											tableRow('.htaccess', ' Required ".htaccess" available', 0);
										}
										$envFileAccess = file_exists('../core/.env');
										if ($envFileAccess == true) {
											$error = $error + 0;
											tableRow('core/.env', '  Required ".env" available', 1);
										} else {
											$error = $error + 1;
											tableRow('core/.env', ' Required ".env" available', 0);
										}
										?>
									</table>
								</div>
								<div class="item text-right">
									<?php
									if ($error==0) {
										echo '<a class="theme-button choto" href="?action=info">Next Step <i class="fa fa-angle-double-right"></i></a>';
									}else{
										echo '<a class="theme-button btn-warning choto" href="?action=file">ReCheck <i class="fa fa-sync-alt"></i></a>';
									}
									?>
								</div>
							</div>
						</div>
					</div>
				</div>
			<?php
			} elseif ($action == 'server') {
			?>
				<div class="installation-wrapper pt-md-5">
					<ul class="installation-menu">
						<li class="steps running">
							<div class="thumb">
							<span>
								<svg width="41" height="41" viewBox="0 0 41 41" fill="none" xmlns="http://www.w3.org/2000/svg">
									<path d="M10.2493 10.25H10.2664M10.2493 30.75H10.2664M6.83268 3.41669H34.166C36.053 3.41669 37.5827 4.94638 37.5827 6.83335V13.6667C37.5827 15.5537 36.053 17.0834 34.166 17.0834H6.83268C4.94571 17.0834 3.41602 15.5537 3.41602 13.6667V6.83335C3.41602 4.94638 4.94571 3.41669 6.83268 3.41669ZM6.83268 23.9167H34.166C36.053 23.9167 37.5827 25.4464 37.5827 27.3334V34.1667C37.5827 36.0537 36.053 37.5834 34.166 37.5834H6.83268C4.94571 37.5834 3.41602 36.0537 3.41602 34.1667V27.3334C3.41602 25.4464 4.94571 23.9167 6.83268 23.9167Z" stroke="white" stroke-width="4" stroke-linecap="round" stroke-linejoin="round"/>
								</svg>

								</span>
							</div>
							<h5 class="content">Server<br>Requirements</h5>
						</li>
						<li class="steps">
							<div class="thumb">
							<span>
								<svg width="33" height="39" viewBox="0 0 33 39" fill="none" xmlns="http://www.w3.org/2000/svg">
									<path d="M19.9154 2.41669H6.2487C5.34254 2.41669 4.4735 2.77666 3.83275 3.41741C3.192 4.05815 2.83203 4.9272 2.83203 5.83335V33.1667C2.83203 34.0728 3.192 34.9419 3.83275 35.5826C4.4735 36.2234 5.34254 36.5834 6.2487 36.5834H26.7487C27.6549 36.5834 28.5239 36.2234 29.1646 35.5826C29.8054 34.9419 30.1654 34.0728 30.1654 33.1667V12.6667M19.9154 2.41669L30.1654 12.6667M19.9154 2.41669V12.6667H30.1654M23.332 21.2084H9.66536M23.332 28.0417H9.66536M13.082 14.375H9.66536" stroke="white" stroke-width="4" stroke-linecap="round" stroke-linejoin="round"/>
								</svg>

								</span>
							</div>
							<h5 class="content">File<br>Permissions</h5>
						</li>
						<li class="steps">
							<div class="thumb">
							<span>
									<svg width="35" height="39" viewBox="0 0 35 39" fill="none" xmlns="http://www.w3.org/2000/svg">
										<path d="M32.875 7.54175C32.875 10.3722 25.9914 12.6667 17.5 12.6667C9.00862 12.6667 2.125 10.3722 2.125 7.54175M32.875 7.54175C32.875 4.71129 25.9914 2.41675 17.5 2.41675C9.00862 2.41675 2.125 4.71129 2.125 7.54175M32.875 7.54175V31.4584C32.875 34.2942 26.0417 36.5834 17.5 36.5834C8.95833 36.5834 2.125 34.2942 2.125 31.4584V7.54175M32.875 19.5001C32.875 22.3359 26.0417 24.6251 17.5 24.6251C8.95833 24.6251 2.125 22.3359 2.125 19.5001" stroke="white" stroke-width="4" stroke-linecap="round" stroke-linejoin="round"/>
									</svg>
								</span>
							</div>
							<h5 class="content">Installation<br>Information</h5>
						</li>
						<li class="steps">
							<div class="thumb">
							<span>
									<svg width="39" height="39" viewBox="0 0 39 39" fill="none" xmlns="http://www.w3.org/2000/svg">
										<path d="M36.5827 17.9283V19.5C36.5806 23.1839 35.3877 26.7684 33.182 29.7189C30.9762 32.6695 27.8758 34.828 24.3431 35.8725C20.8104 36.917 17.0347 36.7916 13.5791 35.5149C10.1235 34.2382 7.17313 31.8787 5.16807 28.7883C3.16301 25.6979 2.21066 22.0421 2.45305 18.3662C2.69543 14.6903 4.11958 11.1912 6.51308 8.3908C8.90658 5.59041 12.1412 3.63875 15.7345 2.82689C19.3278 2.01503 23.0873 2.38646 26.4523 3.88581M36.5827 5.83331L19.4994 22.9337L14.3744 17.8087" stroke="white" stroke-width="4" stroke-linecap="round" stroke-linejoin="round"/>
									</svg>

								</span>
							</div>
							<h5 class="content">Complete<br>Installation</h5>
						</li>
					</ul>
				</div>
				<div class="installation-wrapper">
					<div class="install-content-area">
						<div class="install-item">
							<h3 class="title text-center">Server Requirments</h3>
							<div class="box-item">
								<div class="item table-area">
									<table class="requirment-table">
										<?php
										$error = 0;
										$phpversion = version_compare(PHP_VERSION, '8.1', '>=');
										if ($phpversion == true) {
											$error = $error + 0;
											tableRow("PHP", "Required PHP version 8.1 or higher", 1);
										} else {
											$error = $error + 1;
											tableRow("PHP", "Required PHP version 8.1 or higher", 0);
										}
										foreach ($requiredServerExtensions as $key) {
											$extension = isExtensionAvailable($key);
											if ($extension == true) {
												tableRow($key, "Required " . strtoupper($key) . " PHP Extension", 1);
											} else {
												$error += 1;
												tableRow($key, "Required " . strtoupper($key) . " PHP Extension", 0);
											}
										}
										?>
									</table>
								</div>
								<div class="item text-right">
									<?php
									if ($error==0) {
										echo '<a class="theme-button choto" href="?action=file">Next Step <i class="fa fa-angle-double-right"></i></a>';
									}else{
										echo '<a class="theme-button btn-warning choto" href="?action=server">ReCheck <i class="fa fa-sync-alt"></i></a>';
									}
									?>
								</div>
							</div>
						</div>
					</div>
				</div>
			<?php
			} else {
			?>
				<div class="installation-wrapper">
					<div class="install-content-area">
						<div class="install-item px-3">
							<h3 class="title text-left">Terms of Use</h3>
							<div class="box-item">
								<div class="item">
									<h4 class="subtitle">License to be used on one(1) domain(website) only!</h4>
									<p> The Regular license is for one website or domain only. If you want to use it on multiple websites or domains you have to purchase more licenses (1 website = 1 license). The Regular License grants you an ongoing, non-exclusive, worldwide license to make use of the item.</p>
								</div>
								<div class="item">
									<h5 class="subtitle">You Can:</h5>
									<ul class="check-list">
										<li> Use on one(1) domain only. </li>
										<li> Modify or edit as you want. </li>
										<li> Translate to your choice of language(s).</li>
									</ul>
									<span> <span>
										<img src="assets/images/triangle.svg" alt="triangle icon ">
									</span> If any issue or error occurred for your modification on our code/database, we will not be responsible for that. </span>
								</div>
								<div class="item">
									<h5 class="subtitle">You Cannot: </h5>
									<ul class="check-list">
										<li class="no"> Resell, distribute, give away, or trade by any means to any third party or individual. </li>
										<li class="no"> Include this product into other products sold on any market or affiliate websites. </li>
										<li class="no"> Use on more than one(1) domain. </li>
									</ul>
								</div>
								<div class="item">
									<p class="info">For more information, Please Check <a href="https://codecanyon.net/licenses/faq" target="_blank">The License FAQ</a></p>
								</div>
								<div class="item text-right">
									<a href="?action=server" class="theme-button choto">I Agree, Next Step</a>
								</div>
							</div>
						</div>
					</div>
				</div>
			<?php
			}
			?>
		</div>
	</div>
	<footer class="section-bg py-3 text-center">
		<div class="container">
			<p class="m-0 footer-text">&copy;<?php echo Date('Y') ?> - All Right Reserved by Crafy</p>
		</div>
	</footer>
	<style>
		#hide {
			display: none;
		}
	</style>
</body>

</html>