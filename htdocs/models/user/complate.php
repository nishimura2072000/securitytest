<?php

namespace user;

use libs\Db;

class Complate {
	public function handle() {
		
		$response = $_REQUEST;
		
		session_start();
		if (!isset($_SESSION['id'])) {
			// �����O�C��
			header('Location: /index.html?next='.rawurlencode('user/input.html'));
		}
		
		// DB�X�V
		$id =  $response['id'];
		$pass = $response['password'];
		$sid = $_SESSION['id'];
		$sql = "UPDATE M_USER SET id = '$id', password = '$pass' WHERE id = '$sid';";
		$con = Db::getConnection();
		$con->updateQuery($sql);
		
		// �Z�b�V�������X�V
		$_SESSION['id'] = $id;
		
		return $response;
	}
}