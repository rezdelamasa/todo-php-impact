<?php
	include_once 'config.php';

	class Database extends Config {
		public function get() {
			$sql = 'SELECT * FROM todos ORDER BY created_at DESC';
			$statement = $this->conn->query($sql);
			$rows = $statement->fetchAll();
			return $rows;
		}
	
		public function insert($name) {
			$sql = 'INSERT INTO todos (name) VALUES (:name)';
			$statement = $this->conn->prepare($sql);
			$statement->execute(['name' => $name]);
			return true;
		}

		public function update(int $id, Object $data) {
			$sql = "UPDATE `todos` SET `status`=:status WHERE `id`='$id'";
			$statement = $this->conn->prepare($sql);
			$statement->execute(['status' => $data->status]);
			return true;
		}

		public function delete($id) {
			$sql = 'DELETE FROM todos WHERE id = :id';
			$stmt = $this->conn->prepare($sql);
			$stmt->execute(['id' => $id]);
			return true;
		}
	}