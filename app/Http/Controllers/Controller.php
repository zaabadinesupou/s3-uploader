<?php

namespace App\Http\Controllers;

use App\Models\Shortlink;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Str;

class Controller extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;
    public function welcome(Request $request)
    {
        $file = $request->file('upload');
        if (!empty($file)) {
            $link = Str::slug(env('SERVER_ID')) . '-' . Str::random(20);

            $path = $file->getPathName();

            $s3 = App::make('aws')->createClient('s3');
            $result = $s3->putObject(array(
                'Bucket'     => env('AWS_BUCKET'),
                'Key'        => $link,
                'SourceFile' => $path,
                'ACL'        => 'public-read',
                'ContentType'=> $file->getMimeType(),
            ));
            $url = $result['ObjectURL'];

            $shortlink = strlen($request->post('shortlink')) >= 4 ? $request->post('shortlink') : $link;
            $shortlink = Str::slug($shortlink);
            Shortlink::updateOrCreate(
                [
                    'shortlink' => $shortlink,
                ],
                [
                    'url' => $url
                ]
            );
            return view('welcome', [
                'message' => '&#9989; Your file ' . $file->getClientOriginalName() . ' has been uploaded successfully.',
                'url' => url('/') . '/' . $shortlink
            ]);
        } else {
            return view('welcome');
        }
    }

    public function redirect($any)
    {
        $shortlink = Shortlink::where('shortlink', $any)->firstOrFail();
        return redirect($shortlink->url);
    }
}
