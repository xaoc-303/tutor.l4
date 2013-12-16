<?php

class CatalogController extends BaseController {

    public $base_path;

    function __construct() {
        $this->beforeFilter(function () {
            $this->base_path = public_path().DIRECTORY_SEPARATOR.'docs';
        });
    }

    public function getIndex()
    {
        return View::make('main.index')
            ->with('title',__CLASS__)
            ->nest('content', 'main.catalog');
    }

    public function getFilesInDir( $path = '' ) {
        $path = urldecode ($path);
        $path = str_replace(['/..','/.'],'',$path);
        $path = trim($path, '.\/');
        $full_path = DIRECTORY_SEPARATOR == '\\' ? $this->base_path.DIRECTORY_SEPARATOR.str_replace('/', DIRECTORY_SEPARATOR, $path) : $this->base_path.DIRECTORY_SEPARATOR.$path;

        $full_path = @iconv('UTF-8','CP1251',$full_path);

        if (file_exists($full_path)){
            switch (filetype($full_path)) {
                case 'file':
                    return $this->isFile($full_path, $path);
                case 'dir':
                    if(strlen($path) > 0) {
                        $path .= '/';
                        $files = array_diff(scandir($full_path),array('.'));
                    } else {
                        $files = array_diff(scandir($full_path),array('.','..'));
                    }

                    $list = [];
                    foreach($files as $v) {
                        $new_file_name = @iconv('CP1251','UTF-8',$v);
                        $list[] = ['text' => $new_file_name, 'href' => $path.$new_file_name];
                    }
                    return json_encode(['files', $list], JSON_UNESCAPED_SLASHES | JSON_UNESCAPED_UNICODE);
                default:
                    break;
            }
        }
        $files = scandir($this->base_path);
        return json_encode(['files', $files], JSON_UNESCAPED_SLASHES | JSON_UNESCAPED_UNICODE);
    }

    private function isFile($full_path, $path){
        $extension = pathinfo($full_path,PATHINFO_EXTENSION);
        $ext_img = ['jpg','png','gif'];
        $ext_text = ['txt','html'];
        $ext_music = ['mp3'];
        $ext_video = ['avi','mp4','flv'];

        if(in_array($extension, $ext_img)) {

            return json_encode(['img', '<img src="/docs/'.$path.'" style="width:100%;">']);

        } elseif(in_array($extension, $ext_text)) {

            $content = $extension != 'txt' ? file_get_contents($full_path) : str_replace("\r\n", "<br>", file_get_contents($full_path));
            return json_encode(['text', $content]);

        } elseif(in_array($extension, $ext_music)) {

            return json_encode(['music', View::make('main.player')->with('file', '/docs/'.$path)->render()]);

        } elseif(in_array($extension, $ext_video)) {

            return json_encode(['video', View::make('main.player')->with('file', '/docs/'.$path)->render()]);

        } else {

        }
        return $extension;
    }

}