<?php

class AdminsModel
{
	function __construct($db) {
		$this->db = $db;
	}

	public function getAllAdmins()
	{
		$sql = "SELECT id, username FROM admins ORDER BY id DESC";
		$query = $this->db->prepare($sql);
		$query->execute();

		return $query->fetchAll();
	}

	public function getOneAdmin($id)
	{
		$sql = "SELECT id, username FROM admins WHERE id = :id";
		$query = $this->db->prepare($sql);
		$query->execute(array(':id' => $id));
		return $query->fetch();
	}

	public function getLogAdmin($username)
	{
		$sql = "SELECT id, username, password FROM admins WHERE username = :username";
		$query = $this->db->prepare($sql);
		$query->execute(array(':username' => $username));
		return $query->fetch();
	}

	public function addAdmin($username, $password)
	{
		$username = strip_tags($username);
		$password = strip_tags($password);

		$sql = "INSERT INTO admins (username, password) VALUES (:username, :password)";
		$query = $this->db->prepare($sql);
		$query->execute(array(':username' => $username, ':password' => $password));
	}

	public function editAdmin($id, $username, $password)
	{
		$username = strip_tags($username);
		$password = strip_tags($password);

		$sql = "UPDATE admins SET username = :username, password = :password WHERE id = :id";
		$query = $this->db->prepare($sql);
		$query->execute(array(':username' => $username, ':password' => $password));
	}

	public function deleteAdmin($id)
	{
		$sql = "DELETE FROM admins WHERE id = :id";
		$query = $this->db->prepare($sql);
		$query->execute(array(':id' => $id));
	}
}