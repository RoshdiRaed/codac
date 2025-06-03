<?php

// app/Http/Controllers/Public/HomeController.php

namespace App\Http\Controllers\Public;

use App\Models\Tip;
use App\Models\AdvancedTechnique; // تأكد من وجود هذا الموديل
use App\Http\Controllers\Controller;

class HomeController extends Controller
{
    public function index()
    {
        $tips = Tip::latest()->take(6)->get();
        $advancedTechniques = AdvancedTechnique::latest()->take(3)->get(); // اجلب 3 تقنيات متقدمة مثلاً

        return view('public.home', compact('tips', 'advancedTechniques'));
    }
}
