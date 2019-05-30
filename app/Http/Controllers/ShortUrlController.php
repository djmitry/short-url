<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\ShortUrl;

class ShortUrlController extends Controller
{
    public function index(Request $request)
    {
        $success = $request->session()->get('success');
        return view('short-url', compact('success'));
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'source_url' => 'required|unique:short-url|max:255',
            'short_url' => ' unique:short-url|max:255',
            'date_expire' => 'max:255',
        ]);
        
        if (!$validated['short_url']) {
            $validated['short_url'] = substr(uniqid(), 6, 3);
        }

        $validated['short_url'] = 'su' . $validated['short_url'];
        $model = ShortUrl::create($validated);

        $message = 'Ваша ссылка: <span class="text-danger">' . url($model->short_url) . '</span>';
        if ($model->date_expire) {
            $message .= ' до ' . $model->date_expire;
        }

        $request->session()->flash('success', $message);
        return redirect()->route('shortUrl');
    }
    
    public function follow(Request $request, $url)
    {
        $url = 'su' . $url;
        $model = ShortUrl::where('short_url', $url)->first();

        if (!$model->date_expire || date('Y-m-d H:i:s') < $model->date_expire) {
            return redirect()->to($model->source_url, 301);
        } else {
            throw new \Exception('Ссылка не активна');
        }
    }
}