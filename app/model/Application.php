<?php
namespace App\Model;

use App\Model\Database\QueryBuilder;
use App\Model\Database\Connection;
use PDO;

class Application
{
	private $db;

    public function __construct($db)
    {
        $this->db= $db;
    }

	public function getAll($table)
	{
		$users = $this->db->getAll($table);
		return $users;
	}

	public function add($table,$data)
	{
		$this->db->create($table,$data);
	}
}

