<?php
class Connection
{
    protected $handler;
    private $dsn, $username, $password;
    
    public function __construct()
	{
		
		$this->dsn ='mysql:host=localhost;dbname=neu_hostpital';
        $this->username = 'hosein';
        $this->password = 'qawsed123';
        $this->connect();
    }
	
/*	public function __construct($dsn, $username, $password)
    {
        $this->dsn = $dsn;
        $this->username = $username;
        $this->password = $password;
        $this->connect();
    }
  */  
    private function connect()
    {
		try{
			$this->handler = new PDO($this->dsn, $this->username, $this->password,array(PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES utf8"));
			
			$this->handler->setAttribute(PDO::ATTR_ERRMODE , PDO::ERRMODE_EXCEPTION);
			}
		catch(PDOException $e){
			echo($e->getMessage());
			die();
			}
        
    }
    
    public function __sleep()
    {
        return array('dsn', 'username', 'password');
    }
    
    public function __wakeup()
    {
        $this->connect();
    }
	public function get_connection_handler()
	{
		return $this->handler;
	}
}?>