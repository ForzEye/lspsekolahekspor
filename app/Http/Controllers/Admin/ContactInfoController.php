<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\ContactInfo;
use Illuminate\Http\Request;

class ContactInfoController extends Controller
{
    public function edit()
    {
        $contact = ContactInfo::first() ?? new ContactInfo();
        return view('admin.contact.edit', compact('contact'));
    }

    public function update(Request $request)
    {
        $contact = ContactInfo::first() ?? new ContactInfo();

        $validated = $request->validate([
            'address'        => 'required|string',
            'email'          => 'required|email|max:255',
            'phone'          => 'required|string|max:50',
            'whatsapp'       => 'nullable|string|max:50',
            'maps_embed_url' => 'nullable|string',
            'instagram'      => 'nullable|string|max:255',
            'linkedin'       => 'nullable|string|max:255',
            'youtube'        => 'nullable|string|max:255',
            'office_hours'   => 'nullable|string|max:255',
        ]);

        $contact->fill($validated);
        $contact->save();

        return redirect()->back()->with('success', 'Informasi Kontak berhasil diperbarui.');
    }
}
