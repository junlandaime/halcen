<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\LandingPage;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class LandingPageController extends Controller
{
    public function edit()
    {
        $landingPage = LandingPage::firstOrFail();
        return view('admin.landing-page.edit', compact('landingPage'));
    }

    public function update(Request $request)
    {
        // dd($request);
        $validated = $request->validate([
            'hero_title' => 'required|string|max:255',
            'hero_subtitle' => 'nullable|string',
            'hero_image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            'about_title' => 'required|string|max:255',
            'about_content' => 'required|string',
            'mission_title' => 'required|string|max:255',
            'mission_content' => 'required|string',
            'vision_title' => 'required|string|max:255',
            'vision_content' => 'required|string',
            'stats_clients' => 'required|integer|min:0',
            'stats_projects' => 'required|integer|min:0',
            'stats_partners' => 'required|integer|min:0',
            'contact_address' => 'nullable|string',
            'contact_email' => 'nullable|email',
            'contact_phone' => 'nullable|string',
            'contact_whatsapp' => 'nullable|string',
            'social_facebook' => 'nullable|url',
            'social_twitter' => 'nullable|url',
            'social_instagram' => 'nullable|url',
            'social_linkedin' => 'nullable|url',
            'footer_description' => 'required|string',
            'meta_title' => 'required|string|max:255',
            'meta_description' => 'nullable|string',
            'meta_keywords' => 'nullable|string'
        ]);

        $landingPage = LandingPage::firstOrFail();

        if ($request->hasFile('hero_image')) {
            // Delete old image if exists
            if ($landingPage->hero_image) {
                Storage::disk('public')->delete($landingPage->hero_image);
            }
            $validated['hero_image'] = $request->file('hero_image')->store('landing-page', 'public');
        }

        $landingPage->update($validated);

        return redirect()->back()->with('success', 'Landing page has been updated successfully.');
    }
}
