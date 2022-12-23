<?php

namespace App\Http\Controllers;

use App\Models\Company;
use App\Models\Contact;
// use App\Scopes\FilterScope;
// use App\Scopes\SearchScope;
use Illuminate\Http\Request;

// use Illuminate\Support\Facades\DB;

class ContactController extends Controller
{
    public function index()
    {
        $companies = Company::orderBy('name', 'asc')->pluck('name', 'id')->prepend('All Companies', '');
        // $contacts = Contact::orderBy('first_name', 'asc')->where(function ($query) {
        // DB::enableQueryLog();
        $contacts = Contact::latestFirst()->paginate(10);

        // remove global scopes
        // $contacts = Contact::withoutGlobalScopes()->paginate(10); // remove all global scopes
        // $contacts = Contact::withoutGlobalScope(SearchScope::class)->paginate(10); // remove only `SearchScope` global scope
        // $contacts = Contact::withoutGlobalScopes([FilterScope::class, SearchScope::class])->paginate(10); // remove both `FilterScope` and `SearchScope` global scopes

        // dd(DB::getQueryLog());

        return view('contacts.index', compact('contacts', 'companies'));
    }

    public function create()
    {
        $contact = new Contact();
        $companies = Company::orderBy('name')->pluck('name', 'id')->prepend('All Companies', '');

        return view('contacts.create', compact('companies', 'contact'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'first_name' => 'required',
            'last_name' => 'required',
            'email' => 'required|email',
            'address' => 'required',
            'company_id' => 'required|exists:companies,id',
        ]);

        // dd($request->all());
        // dd($request->only('first_name', 'last_name'));
        // dd($request->except('email', 'address'));

        Contact::create($request->all());

        return redirect()->route('contacts.index')->with('message', 'Contact added successfully');
    }

    public function show($id)
    {
        $contact = Contact::findOrFail($id);

        return view('contacts.show', compact('contact'));
        // return view('contacts.show', ['contact'=>$contact]);
    }

    public function edit($id)
    {
        $companies = Company::orderBy('name')->pluck('name', 'id')->prepend('All Companies', '');
        $contact = Contact::findOrFail($id);

        return view('contacts.edit', compact('companies', 'contact'));
    }

    public function update($id, Request $request)
    {
        $request->validate([
            'first_name' => 'required',
            'last_name' => 'required',
            'email' => 'required|email',
            'address' => 'required',
            'company_id' => 'required|exists:companies,id',
        ]);

        // dd($request->all());

        $contact = Contact::findOrFail($id);
        $contact->update($request->all());

        return redirect()->route('contacts.index')->with('message', 'Contact updated successfully');
    }

    public function destroy($id)
    {
        $contact = Contact::findOrFail($id);
        $contact->delete();

        return redirect()->route('contacts.index')->with('message', 'Contact deleted successfully');
    }
}