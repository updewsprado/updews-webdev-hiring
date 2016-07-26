<?php
class Model extends Database
{
	/*
	registeration for user information
	*/
	public function register($post)
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
	/*
	ramdom quotes for the day
	*/
	public function getQuotes()
	{
		$data = array();
		$array = array(
			'What happens is not as important as how you react to what happens.',
			'Marrying for love may be a bit risky, but it is so honest that God can\'t help but smile on it.',
			'We have art in order not to die of the truth.',
			'Nature is something outside our body, but the mind is within us.',
			'I detest life-insurance agents: they always argue that I shall some day die, which is not so.',
			'There is nothing more likely to start disagreement among people or countries than an agreement.',
			'Love is a sacred reserve of energy; it is like the blood of spiritual evolution.',
			'Art never seems to make me peaceful or pure.',
			'No man has received from nature the right to command his fellow human beings.',
			'Life is just a bowl of pits.',
			'Work out your own salvation. Do not depend on others.',
			'Loved. You can\'t use it in the past tense. Death does not stop that love at all.',
			'What marks the artist is his power to shape the material of pain we all have.',
			'Against her ankles as she trod The lucky buttercups did nod.',
			'I\'ve sometimes thought of marrying - and then I\'ve thought again.',
			);
		$random_keys = array_rand($array,10);
		foreach($random_keys as $key)
		{
			 $data[] = $array[$key];
		}
		return $data;
	}
}
