<?php

namespace App\Http\Controllers;

// use App\Models\Company;
use App\Models\Contact;
use Illuminate\Http\Request;

// use Illuminate\Support\Facades\Auth;
// use Illuminate\Support\Facades\DB;


class ContactController extends Controller
{
    public function __construct()
    {
        $this->middleware(['auth', 'verified']);
    }

    public function index(Request $request)
    {
        // DB::enableQueryLog();
        $companies = $request->user()->companies()->orderBy('name', 'asc')->pluck('name', 'id')->prepend('All Companies', '');
        $contacts = $request->user()->contacts()->latestFirst()->paginate(10);
        // dd(DB::getQueryLog());
        return view('contacts.index', compact('contacts', 'companies'));
    }

    public function create(Request $request)
    {
        $contact = new Contact();
        $companies = $request->user()->companies()->orderBy('name')->pluck('name', 'id')->prepend('All Companies', '');
        return view('contacts.create', compact('companies', 'contact'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'first_name' => ['required', 'string'],
            'last_name' => ['required', 'string'],
            'email' => ['required', 'string', 'email', 'unique:users'],
            'address' => ['required', 'string'],
            'company_id' => ['required', 'exists:companies,id']
        ]);
        $request->user()->contacts()->create($request->all());
        return redirect()->route('contacts.index')->with('message', 'Contact added successfully');
    }

    public function show(Contact $contact)
    {
        return view('contacts.show', compact('contact'));
    }

    public function edit(Contact $contact, Request $request)
    {
        $companies = $request->user()->companies()->orderBy('name')->pluck('name', 'id')->prepend('All Companies', '');
        return view('contacts.edit', compact('companies', 'contact'));
    }

    public function update(Contact $contact, Request $request)
    {
        $request->validate([
            'first_name' => ['required', 'string'],
            'last_name' => ['required', 'string'],
            'email' => ['required', 'email'],
            'address' => ['required', 'string'],
            'company_id' => ['required', 'exists:companies,id'],
        ]);
        $contact->update($request->all());
        return redirect()->route('contacts.index')->with('message', 'Contact updated successfully');
    }

    public function destroy(Contact $contact)
    {
        $contact->delete();
        return redirect()->route('contacts.index')->with('message', 'Contact deleted successfully');
    }

// public function __construct()
// {
//     // make sure middleware('auth') is not attached to any of contact's routes
//     // $this->middleware('auth');
//     $this->middleware(['auth', 'verified']);

//     // apply to only 'create', 'update' and 'destroy' method
//     // $this->middleware('auth')->only('create', 'update', 'destroy');

//     // apply to all methods except 'index' and 'show'
//     // $this->middleware('auth')->except('index', 'show');
// }

// public function index(Request $request)
// {
//     // $user = Auth::user();
//     // $companies = $user->companies()->orderBy('name', 'asc')->pluck('name', 'id')->prepend('All Companies', '');
//     $companies = $request->user()->companies()->orderBy('name', 'asc')->pluck('name', 'id')->prepend('All Companies', '');
//     // $companies = Company::orderBy('name', 'asc')->pluck('name', 'id')->prepend('All Companies', '');
//     // $contacts = Contact::orderBy('first_name', 'asc')->where(function ($query) {
//     // DB::enableQueryLog();
//     $contacts = $request->user()->contacts()->latestFirst()->paginate(10);

//     // remove global scopes
//     // $contacts = Contact::withoutGlobalScopes()->paginate(10); // remove all global scopes
//     // $contacts = Contact::withoutGlobalScope(SearchScope::class)->paginate(10); // remove only `SearchScope` global scope
//     // $contacts = Contact::withoutGlobalScopes([FilterScope::class, SearchScope::class])->paginate(10); // remove both `FilterScope` and `SearchScope` global scopes

//     // dd(DB::getQueryLog());

//     return view('contacts.index', compact('contacts', 'companies'));
// }

// public function create(Request $request)
// {
//     $contact = new Contact();
//     $companies = $request->user()->companies()->orderBy('name')->pluck('name', 'id')->prepend('All Companies', '');

//     return view('contacts.create', compact('companies', 'contact'));
// }

// public function store(Request $request)
// {
//     $request->validate([
//         'first_name' => ['required', 'string'],
//         'last_name' => ['required', 'string'],
//         'email' => ['required', 'string', 'email', 'unique:users'],
//         'address' => ['required', 'string'],
//         'company_id' => ['required', 'exists:companies,id']
//     ]);

//     // dd($request->all());
//     // dd($request->only('first_name', 'last_name'));
//     // dd($request->except('email', 'address'));

//     // Auth::user()->contacts()->create($request->all());
//     $request->user()->contacts()->create($request->all());

//     return redirect()->route('contacts.index')->with('message', 'Contact added successfully');
// }

// public function show(Contact $contact)
// {
//     return view('contacts.show', compact('contact'));
//     // return view('contacts.show', ['contact'=>$contact]);
// }

// public function edit(Contact $contact, Request $request)
// {
//     // $companies = auth()->user()->companies()->orderBy('name')->pluck('name', 'id')->prepend('All Companies', '');
//     $companies = $request->user()->companies()->orderBy('name')->pluck('name', 'id')->prepend('All Companies', '');
//     // $contact = Contact::findOrFail($id);
//     // $contact = auth()->user()->contacts()->findOrFail($id);

//     return view('contacts.edit', compact('companies', 'contact'));
// }

// public function update(Contact $contact, Request $request)
// {
//     $request->validate([
//         'first_name' => 'required',
//         'last_name' => 'required',
//         'email' => 'required|email',
//         'address' => 'required',
//         'company_id' => 'required|exists:companies,id',
//     ]);

//     // dd($request->all());

//     // $contact = Contact::withoutGlobalScopes()->findOrFail($id);

//     $contact->update($request->all());

//     return redirect()->route('contacts.index')->with('message', 'Contact updated successfully');
// }

// public function destroy(Contact $contact)
// {
//     // $contact = Contact::withoutGlobalScopes()->findOrFail($id);
//     $contact->delete();

//     return redirect()->route('contacts.index')->with('message', 'Contact deleted successfully');
// }

}