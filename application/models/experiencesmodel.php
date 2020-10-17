<?php

class ExperiencesModel
{
	function __construct($db) {
		$this->db = $db;
	}

	public function getAllExperiences()
	{
		$sql = "SELECT id, title, body, created, modified, admin_id, type_file, name_id FROM experiences ORDER BY id DESC";
		$query = $this->db->prepare($sql);
		$query->execute();

		return $query->fetchAll();
	}

	public function getLimitExperiences($first, $nb)
	{
		$sql = "SELECT id, title, body, created, modified, admin_id, type_file, name_id FROM experiences ORDER BY id DESC LIMIT ?, ?;";
		$query = $this->db->prepare($sql);
		$query->bindValue(1, $first, PDO::PARAM_INT);
		$query->bindValue(2, $nb, PDO::PARAM_INT);
		$query->execute();

		return $query->fetchAll();
	}

	public function getOneExperience($name_id)
	{
		$sql = "SELECT id, title, body, created, modified, admin_id, type_file, name_id FROM experiences WHERE name_id = :name_id";
		$query = $this->db->prepare($sql);
		$query->execute(array(':name_id' => $name_id));
		
		return $query->fetch();
	}

	public function getNbExperience()
	{
		$sql = "SELECT COUNT(*) AS nb FROM experiences";
		$query = $this->db->prepare($sql);
		$query->execute();

		return $query->fetch();
	}

	public function addExperience($title, $body, $created, $modified, $admin_id, $type_file, $name_id)
	{
		$title = strip_tags($title);
		$body = strip_tags($body);

		$sql = "INSERT INTO experiences (title, body, created, modified, admin_id, type_file, name_id) VALUES (:title, :body, :created, :modified, :admin_id, :type_file, :name_id)";
		$query = $this->db->prepare($sql);
		$query->execute(array(':title' => $title, ':body' => $body, ':created' => $created, ':modified' => $modified, ':admin_id' => $admin_id, ':type_file' => $type_file, ':name_id' => $name_id));
	}

	public function editExperience($id, $title, $body, $created, $modified, $admin_id, $type_file, $name_id)
	{
		$title = strip_tags($title);
		$body = strip_tags($body);

		$sql = "UPDATE experiences SET title = :title, body = :body, created = :created, modified = :modified, admin_id = :admin_id, type_file = :type_file, name_id = :name_id WHERE id = :id";
		$query = $this->db->prepare($sql);
		$query->execute(array(':id' => $id, ':title' => $title, ':body' => $body, ':created' => $created, ':modified' => $modified, ':admin_id' => $admin_id, ':type_file' => $type_file, ':name_id' => $name_id));
	}

	public function deleteExperience($name_id)
	{
		$sql = "DELETE FROM experiences WHERE name_id = :name_id";
		$query = $this->db->prepare($sql);
		$query->execute(array(':name_id' => $name_id));
	}
}