<?php

namespace App\Http\Controllers;

use App\Models\Event;
use App\Models\Sponsor;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class SponsorController extends Controller
{
    public function destroy(Sponsor $sponsor)
    {
        Storage::delete($sponsor->logo_path);
        $sponsor->delete();

        return back()->with('success', 'Sponsor logo deleted successfully.');
    }


}
