<?php

namespace app\models;

use Yii;
use yii\base\Model;

/**
 * ContactForm is the model behind the contact form.
 */
class RegisterForm extends Model
{   
    

    public $name;
    public $surname;
    public $patronymic;
    public $login;
    public $email;
    public $password;
    public $password_repeat;
    public $rules;

    /**
     * @return array the validation rules.
     */
    public function rules()
    {
        return [
            // name, email, subject and body are required
            [['name', 'surname', 'login', 'email', 'password', 'password_repeat', 'rules'], 'required'],
            ['email','email'],
            //уникльность password и username
            [['email', 'login'], 'unique', 'targetClass' =>User::class],
            //проверка password и password_repeat  
            ['password_repeat', 'compare', 'compareAttribute' => 'password'],
            // проверка кнопки подтверждения правил на нажатость
            //минимальное количество символов password
            ['password', 'string', 'min' => 6],
            ['rules', 'boolean'],
            ['rules', 'compare', 'compareValue' => 1,'message'=>'обязательно для заполнения'],
            ['patronymic','string']
            //только латиница, тире и цифры
            //['login', 'match', 'pattern' => '/^[a-z0-9-]+$/i'],
            //только кирилица и цифры
            //['', 'match', 'pattern' => '/^[а-я0-9- ]+$/i']
        ];
    }

    /**
     * @return array customized attribute labels
     */
    public function attributeLabels()
    {
        return [
            'verifyCode' => 'Verification Code',
        ];
    }

    /**
     * Sends an email to the specified email address using the information collected by this model.
     * @param string $email the target email address
     * @return bool whether the model passes validation
     */
    public function Reg($email)
    {
        if ($this->validate()) {
            Yii::$app->mailer->compose()
                ->setTo($email)
                ->setFrom([Yii::$app->params['senderEmail'] => Yii::$app->params['senderName']])
                ->setReplyTo([$this->email => $this->name])
                ->setSubject($this->subject)
                ->setTextBody($this->body)
                ->send();

            return true;
        }
        return false;
    }
    public function addUser()
    {
        if($this->validate())
        {
            $User = new User();
            
            if($User->load($this->attributes, ''))
            {
                $User->save(false);
                return $User;
            }
        }
        return false;
    }
}
