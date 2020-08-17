<?php
error_reporting(0);
    session_start();
    class Database
    {
		private $connection;
		function __construct()
		{
			$this->open_connection();
		}
		
		public function open_connection()
		{
			//$this->connection = mysql_connect('192.168.1.58','innovins','1751985');
			$this->connection = mysql_connect('localhost','seeinind_sameer','8(abroCw5xyR');
			
			mysql_select_db('seeinind_seeinindia');
			if(!$this->connection)
			{
				die("Database connection failed".mysql_error());
			}
		}
		
		public function close_connection()
		{
			if(isset($this->connection))
			{
				mysql_close($this->connection);
				unset($this->connection);
			}
		}
		
		public function query($sql)
		{
			$result=mysql_query($sql);
			if(!$result)
			{
				die("Database query failed".mysql_error());
			}
			return $result;
		}
		
		public function fetch($query)
		{
			$row=mysql_fetch_array($query);
			
			return $row;
		}
		 
	}    
?>