<?php

namespace App\Http\Controllers;  
  
use App\Models\Link;  
use Illuminate\Http\Request;  
use Illuminate\Support\Facades\Auth;  
use Illuminate\Support\Str;  
  
class LinkController extends Controller  
{  
    public function index()  
    {  
        $links = Auth::user()->links()->latest()->get();  
        return view('links.index', compact('links'));  
    }  
  
    public function store(Request $request)  
    {  
        $request->validate([  
            'original_url' => 'required|url',  
            'short_code' => 'nullable|unique:links,short_code',  
        ]);  
  
        $shortCode = $request->short_code ?? Str::random(6);  
  
        Link::create([  
            'user_id' => Auth::id(),  
            'original_url' => $request->original_url,  
            'short_code' => $shortCode,  
        ]);  
  
        return redirect()->route('links.index')->with('success', 'Link berhasil dibuat!');  
    }  
  
    public function show($shortCode)  
    {  
        $link = Link::where('short_code', $shortCode)->firstOrFail();  
        $link->increment('clicks');  
  
        return redirect()->away($link->original_url);  
    }  
  
    public function destroy(Link $link)  
    {  
        $link->delete();  
        return redirect()->route('links.index')->with('success', 'Link berhasil dihapus!');  
    }  
}  
