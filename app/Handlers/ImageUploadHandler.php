<?php
namespace App\Handlers;
use Intervention\Image\Drivers\Gd\Driver;
use Intervention\Image\ImageManager;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\DB;


class ImageUploadHandler {
    // 声明一个属性 允许上传的文件的后缀
    protected $allowed_ext = ['png', 'gif', 'jpg', 'jpeg'];

    // 声明一个方法 用于存储图片
    // $file是 UploadedFile实例  $folder是文件夹名字  $model_id是用户id
    public function save($file, $folder, $model_id, int $max_width, $unlink=false )
    {
        // 1.1 获取文件夹路径
        $folder_name = "uploads/images/$folder/" . date('Ym/d', time());
        // 1.2获取静态资源路径 + 文件路径
        $upload_path = public_path() . '/' . "$folder_name";
        // 1.3 获取后缀  用三元表达式，如果没有后缀就给一个默认的png
        $extension = strtolower($file->getClientOriginalExtension()) ?: 'png';
        // 1.4 设置图片名称
        $filename = md5($model_id . time()) . '.' . $extension;
        // 1.5判断 后缀名是否符合标准
        if(!in_array($extension, $this->allowed_ext)) {
            return false;
        }

        // 1.6 把文件从临时文件去上传到物理路径里面， 然后把文件名修改为这里设置的文件名
        $file->move($upload_path, $filename);

        // 2.处理缩放
        $this->reduceSize("{$upload_path}/{$filename}", $max_width);

        // 3.删除旧图片
        if ($unlink) {
            $this->delOldImage($model_id);
        }


        // 4.返回图片的url完整地址
        return [
            'path'=>config('app.url') . "/$folder_name/$filename"
        ];
    }

    // 缩放图片方法
    public function reduceSize(string $file_path, int $max_width): void
    {
        // 创建一个图像处理“管理器”对象，并指定使用 GD 图像驱动。
        $manager = new ImageManager(new Driver());

        // 读取图像
        $image = $manager->read($file_path);

        // 根据图片中的 EXIF Orientation 信息，自动把图片旋转到“人眼看到的正确方向”
        $image->orient();

        // 等比缩放
        $image->scaleDown($max_width);

        // 覆盖保存
        $image->save($file_path);

    }

    // 删除旧的图片方法
    public function delOldImage($user_id)
    {
        $user = DB::table('users')->find($user_id);
        if ($user) {
            $user_avatar = $user->avatar;
            // 1. 字符传拆分成数组
            $pic_arr = explode('/', $user_avatar);

            // 2. 截取需要的数组， 偏移3  取5个数组 重新构成新数组
            $path_arr = array_slice($pic_arr, 3, 5);

            // 3. 把这5个数组 用 / 合并为字符串  得到文件的相对路径
            $folder_path = implode('/', $path_arr);

            // 4. 旧的图片文件名
            $old_file_name = array_pop($pic_arr);

            // 5. 旧文件的绝对路径名
            $real_path = public_path() . '/' . $folder_path . '/' . $old_file_name;

            // 6. 删除文件 @有错误也不要报
            @unlink($real_path);
        }

    }
}
