<?
$db_host = "localhost";
$db_user = "root";
$db_passwd = "0000";
$db_name = "employees";

$conn = new mysqli ($db_host, $db_user, $db_passwd, $db_name);

if ($conn->connect_errno) {
    die('Connection Error : ' . $conn->connect_error);
} else {
  $id = $_POST['user_id'];
  $pwd = $_POST['user_password'];

  $query="SELECT * from login where uid = '$id'";
  $result = mysqli_query($conn, $query);

  $num = mysqli_num_rows($result);

  if (!$num) {
?>
  <script>
    alert('해당 아이디가 없습니다.\n회원 가입을 먼저 해주세요.');
    location.href = "./login_form.php";
  </script>
<?
  } else {
?>
  <script>
    alert('축하합니다. 로그인되셨습니다.');
  </script>
<?
     echo "<H1>" . $id . "님 환영합니다</H1><br>";  
  }
}



mysqli_close($conn);
?>
