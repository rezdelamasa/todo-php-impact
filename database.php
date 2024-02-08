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

		public function update() {

		}

		public function delete() {

		}
	}