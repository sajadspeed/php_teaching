<?php
	include "../include/db.php";
	include "../include/function.php";
?>
<!DOCTYPE html>
<html>
	<?php
		head();
	?>
	<body>
		<?php
			if(isset($_POST['submit'])){
				$password = hash("sha256", $_POST['password']);
				$select = mysqli_query($con, "SELECT `id`, `email` FROM `user` WHERE `username`='{$_POST['username']}' AND `password`='$password'");

				$user = mysqli_fetch_all($select, MYSQLI_ASSOC);

				if(count($user) == 1){
					alert("کاربر با ایمیل {$user[0]['email']} خوش آمدید", "success");
				}
				else{
					alert("اطلاعات نامعتبر");
				}
			}
		?>

		<form action="" method="POST">
			<input type="text" name="username" placeholder="نام کاربری:" required>
			<input type="password" name="password" placeholder="پسورد:" required>
			<button name="submit">ورود</button>
		</form>
	</body>
</html>