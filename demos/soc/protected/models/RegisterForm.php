<?php

/**
 * RegisterForm class.
 * RegisterForm is the data structure for keeping
 * user registration form data. It is used by the 'register' action of 'LoginController'.
 */
class RegisterForm extends AuthForm
{
	public $password2;
	public $email;
	
	/**
	 * Declares the validation rules.
	 * The rules state that username and password are required,
	 * and password needs to be authenticated.
	 */
	public function rules()
	{
		return array(
			// username and password are required
			array('username, password, password2, email', 'required'),
			// rememberMe needs to be a boolean
			array('password', 'compare', 'compareAttribute'=>'password2'),
			// email must be a valid email
			array('email', 'email'),
			// must be registered
			array('username', 'userNotExists'),
		);
	}
	
	/**
	 * Declares attribute labels.
	 */
	public function attributeLabels()
	{
		return array(
			'password2' => 'Repeat password',
		);
	}
	
	/**
	 * Checks if user with given username is already registered
	 * @param $attribute
	 * @param $params
	 */
	public function userNotExists($attribute, $params)
	{
		if(!$this->hasErrors())
		{
			$user = User::model()->find('username=:username', array('username'=>$this->username));
			
			if($user !== null)
				$this->addError('username', 'User with this name is registered');
		}
	}
	
	/**
	 * Registers the user and logs in
	 * @return bool whether register is successfull
	 */
	public function register()
	{
		$user = new User;
		$user->username = $this->username;
		$user->password = md5($this->password);
		$user->email = $this->email;
		$user->save();
		
		return $this->login();
	}
}
