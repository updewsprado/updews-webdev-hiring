<?php

class User extends Model 
{
	public function setRegister($post)
	{
		try
		{
			$name = $post['txtfname'];
			$age =  $post['txtage'];
			$email = $post['txtemail'];
			$pbo = $this->db->prepare("INSERT INTO userinfo (`name`, `email`, `age`) 
					   VALUES(:name, :email, :age)");
			$pbo->bindparam(":age", $age); 
			$pbo->bindparam(":name", $name); 
			$pbo->bindparam(":email", $email);
			$pbo->execute();
			
			return true;
		}	
		catch(PDOException $e)
        {
		
			return false;
        } 
	}
}
