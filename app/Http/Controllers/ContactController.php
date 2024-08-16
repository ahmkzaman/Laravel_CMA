<?php

namespace App\Http\Controllers;

use App\Models\Contact;
use Illuminate\Http\Request;

class ContactController extends Controller
{

    public function create()
    {
        return view('create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:100',
            'email' => 'required|email|max:200',
            'phone' => 'required|string|max:20',
            'address' => 'nullable|string|max:255',
        ]);

        Contact::create([
            'name' => $request->input('name'),
            'email' => $request->input('email'),
            'phone' => $request->input('phone'),
            'address' => $request->input('address'),
        ]);

        return redirect()->route('contacts.index');
    }

    public function index(Request $request)

    {
        $sortColumn = $request->get('sort', 'name');
        $sortDirection = $request->get('direction', 'asc');
        $validSortColumns = ['name', 'created_at'];
        $validSortDirections = ['asc', 'desc'];

        if (!in_array($sortColumn, $validSortColumns)) {
            $sortColumn = 'name';
        }
        if (!in_array($sortDirection, $validSortDirections)) {
            $sortDirection = 'asc';
        }

        $search = $request->input('search');
        $contacts = Contact::query();

        if ($search) {
            $contacts->where('name', 'like', '%' . $search . '%')
                ->orWhere('email', 'like', '%' . $search . '%');
        }
        $contacts->orderBy($sortColumn, $sortDirection);
        $contacts = $contacts->get();
        return view('index', compact('contacts', 'sortColumn', 'sortDirection'));
    }

    public function show($id)
    {
        $contact = Contact::find($id);
        return view('show', compact('contact'));
    }
    public function edit($id)
    {
        $contact = Contact::find($id);
        return view('edit', compact('contact'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'name' => 'required|string|max:100',
            'email' => 'required|email|max:200',
            'phone' => 'required|string|max:20',
            'address' => 'nullable|string|max:255',
        ]);
        $contact = Contact::find($id);
        $contact->update([
            'name' => $request->input('name'),
            'email' => $request->input('email'),
            'phone' => $request->input('phone'),
            'address' => $request->input('address')
        ]);
        return redirect()->route('contacts.index');
    }

    public function delete($id)
    {
        $contact = Contact::find($id);
        $contact->delete();
        return redirect()->route('contacts.index');
    }
}
