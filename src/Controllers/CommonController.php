<?php

namespace Insyghts\Common\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Storage;

class CommonController extends Controller
{
    public function fileUpload($photo, $path, $name)
    {
        try {
            $random = rand(1, 99999);
            $name = $name . '_' . $random . '.' . $photo->getClientOriginalExtension();
            $path = $path . $name;
            Storage::disk('s3')->put($path, file_get_contents($photo), 0777);
            return $path;
        } catch (\Throwable $e) {
            return 0;
        }
    }
}
