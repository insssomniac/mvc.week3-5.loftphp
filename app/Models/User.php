<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Capsule\Manager as DB;
use Swift_SmtpTransport;
use Swift_Mailer;
use Swift_Message;

class User extends Model
{
    protected $table = 'users';
    protected $fillable = ['name', 'email', 'password'];

    public $timestamps = false;

    public function posts()
    {
        return $this->hasMany(Post::class, 'author_id');
    }

    public function sendRegistrationEmail()
    {
            try {
                $transport = (new Swift_SmtpTransport(SMTP_HOST, SMTP_PORT, 'ssl'))
                    ->setUsername(SMTP_USER)
                    ->setPassword(SMTP_PASSWORD);
                $mailer = (new Swift_Mailer($transport));
                $message = (new Swift_Message('Вы успешно зарегистрировались'))
                    ->setFrom(SMTP_USER)
                    ->setTo($this->email)
                    ->setBody('Поздравляем! Вы успешно зарегистрировались на Интересном блоге, добро пожаловать на борт!');
                $result = $mailer->send($message);
            } catch (Exception $e) {
                echo print_r($e->getMessage());
                echo print_r($e->getTrace(), 1);
            }
    }

    public static function getPasswordHash(string $password)
    {
        return sha1('fg#%^&hj' . $password);
    }

    public static function deletePosts($userId)
    {
        self::deletePictures($userId);
        DB::table('posts')->where('author_id', $userId)->delete();
    }

    public static function deletePictures($userId)
    {
        $picQuery = DB::select('SELECT image FROM posts WHERE author_id = ?', [$userId]);

        foreach ($picQuery as $pic) {
            $imgPath = 'images/' . $pic->image;
            if ($pic->image && file_exists($imgPath)) {
                unlink($imgPath);
            }
        }
    }

    public static function deleteUser($userId)
    {
        self::deletePosts($userId);
        DB::table('users')->where('id', $userId)->delete();
    }

    /**
     * @return mixed
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * @return mixed
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * @return mixed
     */
    public function getPassword()
    {
        return $this->password;
    }

    /**
     * @return bool
     */
    public function isAdmin(): bool
    {
        return in_array($this->id, ADMIN_IDS);
    }


}