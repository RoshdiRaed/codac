<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Tip;
use App\Models\DevTool;
use App\Models\OpenSourceProject;

class HomeController extends Controller
{
    public function index()
    {
        // Get the latest tips (adjust the number as needed)
        $tips = [
            [
                'title' => 'نصيحة برمجية',
                'content' => 'استخدم الأكواد البرمجية النظيفة والمعلّمة بشكل جيد لتسهيل الصيانة',
                'category' => 'نصائح عامة',
                'date' => now()->subDays(2)->format('Y-m-d')
            ],
            [
                'title' => 'أفضل الممارسات',
                'content' => 'احرص على كتابة تعليقات توضيحية للكود الخاص بك',
                'category' => 'أفضل الممارسات',
                'date' => now()->subDays(1)->format('Y-m-d')
            ],
            [
                'title' => 'تحسين الأداء',
                'content' => 'استخدم التحميل الكسول للعلاقات في Laravel لتحسين الأداء',
                'category' => 'أداء',
                'date' => now()->format('Y-m-d')
            ]
        ];

        // Tracks data
        $tracks = [
            [
                'id' => 1,
                'title' => 'تطوير الويب',
                'description' => 'تعلم تطوير تطبيقات الويب الحديثة باستخدام أحدث التقنيات',
                'icon' => '💻',
                'color' => 'blue',
                'courses_count' => 15,
                'category' => 'web'
            ],
            [
                'id' => 2,
                'title' => 'تطوير التطبيقات',
                'description' => 'أنشئ تطبيقات الهاتف المحمول لأنظمة iOS و Android',
                'icon' => '📱',
                'color' => 'green',
                'courses_count' => 10,
                'category' => 'mobile'
            ],
            [
                'id' => 3,
                'title' => 'علوم البيانات',
                'description' => 'اكتشف رؤى قيمة من البيانات الكبيرة',
                'icon' => '📊',
                'color' => 'purple',
                'courses_count' => 8,
                'category' => 'data'
            ]
        ];

        // Advanced Techniques data
        $advancedTechniques = [
            [
                'id' => 1,
                'title' => 'البرمجة المتوازية',
                'content' => 'تعلم كيفية كتابة أكواد متوازية لتحسين أداء تطبيقاتك',
                'category' => 'performance'
            ],
            [
                'id' => 2,
                'title' => 'الذكاء الاصطناعي التطبيقي',
                'content' => 'كيفية دمج نماذج الذكاء الاصطناعي في تطبيقاتك',
                'category' => 'ai'
            ],
            [
                'id' => 3,
                'title' => 'أمان التطبيقات',
                'content' => 'أفضل الممارسات لتأمين تطبيقاتك من الثغرات الأمنية',
                'category' => 'security'
            ]
        ];

        $allArticles = [
            [
                'id' => 1,
                'title' => 'مقدمة في لغة البرمجة بايثون',
                'content' => 'تعرف على أساسيات لغة البرمجة بايثون وكيفية استخدامها في تطوير التطبيقات',
                'category' => 'برمجة',
                'date' => now()->subDays(5)->format('Y-m-d')
            ],
            [
                'id' => 2,
                'title' => 'أساسيات قواعد البيانات',
                'content' => 'دليل شامل لفهم قواعد البيانات العلائقية وكيفية التعامل معها',
                'category' => 'قواعد بيانات',
                'date' => now()->subDays(3)->format('Y-m-d')
            ],
            [
                'id' => 3,
                'title' => 'أفضل أدوات المطورين في 2023',
                'content' => 'تعرف على أحدث وأفضل الأدوات التي يحتاجها كل مبرمج في عمله اليومي',
                'category' => 'أدوات',
                'date' => now()->subDay()->format('Y-m-d')
            ],
            [
                'id' => 4,
                'title' => 'مقدمة في تعلم الآلة',
                'content' => 'تعرف على أساسيات تعلم الآلة وكيفية تطبيقه في المشاريع البرمجية',
                'category' => 'ذكاء اصطناعي',
                'date' => now()->format('Y-m-d')
            ]
        ];

        // Fetch additional data from database
        $tools = DevTool::orderBy('order')->get();
        $projects = OpenSourceProject::latest()->take(6)->get();

        return view('pages.home', compact('tips', 'tracks', 'advancedTechniques', 'allArticles', 'tools', 'projects'));
    }
}
