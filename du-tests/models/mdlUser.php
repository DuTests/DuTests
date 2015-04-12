<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "mdl_user".
 *
 * @property string $id
 * @property string $auth
 * @property integer $confirmed
 * @property integer $policyagreed
 * @property integer $deleted
 * @property integer $suspended
 * @property string $mnethostid
 * @property string $username
 * @property string $password
 * @property string $idnumber
 * @property string $firstname
 * @property string $lastname
 * @property string $email
 * @property integer $emailstop
 * @property string $icq
 * @property string $skype
 * @property string $yahoo
 * @property string $aim
 * @property string $msn
 * @property string $phone1
 * @property string $phone2
 * @property string $institution
 * @property string $department
 * @property string $address
 * @property string $city
 * @property string $country
 * @property string $lang
 * @property string $calendartype
 * @property string $theme
 * @property string $timezone
 * @property string $firstaccess
 * @property string $lastaccess
 * @property string $lastlogin
 * @property string $currentlogin
 * @property string $lastip
 * @property string $secret
 * @property string $picture
 * @property string $url
 * @property string $description
 * @property integer $descriptionformat
 * @property integer $mailformat
 * @property integer $maildigest
 * @property integer $maildisplay
 * @property integer $autosubscribe
 * @property integer $trackforums
 * @property string $timecreated
 * @property string $timemodified
 * @property string $trustbitmask
 * @property string $imagealt
 * @property string $lastnamephonetic
 * @property string $firstnamephonetic
 * @property string $middlename
 * @property string $alternatename
 */
class mdlUser extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'mdl_user';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['confirmed', 'policyagreed', 'deleted', 'suspended', 'mnethostid', 'emailstop', 'firstaccess', 'lastaccess', 'lastlogin', 'currentlogin', 'picture', 'descriptionformat', 'mailformat', 'maildigest', 'maildisplay', 'autosubscribe', 'trackforums', 'timecreated', 'timemodified', 'trustbitmask'], 'integer'],
            [['description'], 'string'],
            [['auth', 'phone1', 'phone2'], 'string', 'max' => 20],
            [['username', 'firstname', 'lastname', 'email', 'timezone'], 'string', 'max' => 100],
            [['password', 'idnumber', 'institution', 'department', 'address', 'url', 'imagealt', 'lastnamephonetic', 'firstnamephonetic', 'middlename', 'alternatename'], 'string', 'max' => 255],
            [['icq', 'secret'], 'string', 'max' => 15],
            [['skype', 'yahoo', 'aim', 'msn', 'theme'], 'string', 'max' => 50],
            [['city'], 'string', 'max' => 120],
            [['country'], 'string', 'max' => 2],
            [['lang', 'calendartype'], 'string', 'max' => 30],
            [['lastip'], 'string', 'max' => 45],
            [['mnethostid', 'username'], 'unique', 'targetAttribute' => ['mnethostid', 'username'], 'message' => 'The combination of Mnethostid and Username has already been taken.']
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'auth' => 'Auth',
            'confirmed' => 'Confirmed',
            'policyagreed' => 'Policyagreed',
            'deleted' => 'Deleted',
            'suspended' => 'Suspended',
            'mnethostid' => 'Mnethostid',
            'username' => 'Username',
            'password' => 'Password',
            'idnumber' => 'Idnumber',
            'firstname' => 'Firstname',
            'lastname' => 'Lastname',
            'email' => 'Email',
            'emailstop' => 'Emailstop',
            'icq' => 'Icq',
            'skype' => 'Skype',
            'yahoo' => 'Yahoo',
            'aim' => 'Aim',
            'msn' => 'Msn',
            'phone1' => 'Phone1',
            'phone2' => 'Phone2',
            'institution' => 'Institution',
            'department' => 'Department',
            'address' => 'Address',
            'city' => 'City',
            'country' => 'Country',
            'lang' => 'Lang',
            'calendartype' => 'Calendartype',
            'theme' => 'Theme',
            'timezone' => 'Timezone',
            'firstaccess' => 'Firstaccess',
            'lastaccess' => 'Lastaccess',
            'lastlogin' => 'Lastlogin',
            'currentlogin' => 'Currentlogin',
            'lastip' => 'Lastip',
            'secret' => 'Secret',
            'picture' => 'Picture',
            'url' => 'Url',
            'description' => 'Description',
            'descriptionformat' => 'Descriptionformat',
            'mailformat' => 'Mailformat',
            'maildigest' => 'Maildigest',
            'maildisplay' => 'Maildisplay',
            'autosubscribe' => 'Autosubscribe',
            'trackforums' => 'Trackforums',
            'timecreated' => 'Timecreated',
            'timemodified' => 'Timemodified',
            'trustbitmask' => 'Trustbitmask',
            'imagealt' => 'Imagealt',
            'lastnamephonetic' => 'Lastnamephonetic',
            'firstnamephonetic' => 'Firstnamephonetic',
            'middlename' => 'Middlename',
            'alternatename' => 'Alternatename',
        ];
    }
}
