<?php
namespace App\Models;

//use Base\Db;
use Intervention\Image\ImageManagerStatic as IImage;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Capsule\Manager as DB;

class Post extends Model
{
    protected $table = 'posts';
    protected $fillable = ['title', 'text', 'image'];

    public $timestamps = false;

    public function author()
    {
        return $this->belongsTo(User::class, 'author_id');
    }

    public static function getUserPosts(int $userId, int $limit = 20): array
    {
        $data = Post::where('author_id', '=', $userId)->take($limit)->get();
        if (!$data) {
            return [];
        }
        $posts = [];
        foreach ($data as $post) {
            $posts[] = $post;
        }
        return $posts;
    }

    /**
     * @param User $author
     */
    public function setAuthor(User $author): void
    {
        $this->author = $author;
    }

    private function genFileName()
    {
        return sha1(microtime(1) . mt_rand(1, 100000000)) . '.jpg';
    }

    public function loadFile(string $file)
    {
        if (file_exists($file)) {
            $this->image = $this->genFileName();
            move_uploaded_file($file, getcwd() . '/images/' . $this->image);
            $image = 'images/' . $this->image;
            $this->imageHandler($image);
        }
    }

    public function imageHandler(string $image)
    {
        $img = IImage::make($image)
            ->resize(800, null, function ($constraint){
                $constraint->aspectRatio();
            })
            ->text('YAIB',20,20, function($font){
                $font->size(30);
                $font->color('#E7E7E7');
            })
            ->save($image);
    }

    /**
     * @return mixed|string
     */
    public function getImage()
    {
        return $this->image;
    }

    public function getData()
    {
        return[
            'id' => $this->id,
            'author_id' => $this->authorId,
            'title' => $this->title,
            'text' => $this->text,
            'created_at' => $this->createdAt,
            'image' => $this->image,
        ];
    }

    public static function deletePost(int $postId)
    {
        $picQuery = DB::select('SELECT image FROM posts WHERE id = ?', [$postId]);
        $pic = $picQuery[0]->image;
        $ret = DB::table('posts')->where('id', $postId)->delete();

        if ($ret == true && $pic) {
            $imgPath = 'images/' . $pic;
            if (file_exists($imgPath)) {
                unlink($imgPath);
                return $ret;
            }
        }

        return $ret;
    }
}