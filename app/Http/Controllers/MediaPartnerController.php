<?php

namespace App\Http\Controllers;

use App\Models\Event;
use App\Models\MediaPartner;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class MediaPartnerController extends Controller
{
    public function destroy(MediaPartner $mediaPartner)
    {
        Storage::delete($mediaPartner->logo_path);
        $mediaPartner->delete();

        return back()->with('success', 'Media Partner logo deleted successfully.');
    }


}
