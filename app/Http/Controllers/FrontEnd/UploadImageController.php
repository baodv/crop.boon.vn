<?php

namespace App\Http\Controllers\FrontEnd;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Services\UploadImageService;
use Illuminate\Support\Facades\Response;
use Illuminate\Support\Facades\Storage;

class UploadImageController extends Controller
{
    const TEMP_IMAGE = 'uploads';

    /**
     * @var request
     */
    protected $request;

    /**
     * @var uploadService
     */
    protected $uploadService;

    /**
     * @var $pathView
     */
    private $pathView = 'admin.slider.';

    public function __construct(
        Request $request,
        UploadImageService $uploadService
    )
    {
        $this->request = $request;
        $this->uploadService = $uploadService;
    }

    public function store(Request $request)
    {
        $imageId = date('His');
    	$save_name = $this->uploadService->handelUploadImage($request);
        $uploadPath = self::TEMP_IMAGE;
        $full_path = $uploadPath .'/' .$save_name;
        $full_path = 'storage/'.$full_path;
        $newImages = view('frontend.image.index', compact('full_path','imageId'))->render();
        return response()->json([
            'hasBadImage' => false,
            'imageId' => $imageId,
            'imagePath' => $full_path,
            'newImages'   => $newImages
        ]);

    }

    public function changeFrame(Request $request)
    {
        $frame = $request->frame;
        return $frame;
    }

    public function resetImage(Request $request)
    {
        $image_id = $request->image_id;
        return $image_id;
    }

    public function deleteImage(Request $request)
    {
        $image_id = $request->image_id;
        return $image_id;
    }
}
