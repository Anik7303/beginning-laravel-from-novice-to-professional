<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Contact extends Model
{
    use HasFactory;

    protected $fillable = ['first_name', 'last_name', 'phone', 'email', 'address', 'company_id'];

    public function company()
    {
        return $this->belongsTo(Company::class);
    }

    public function scopeLatestFirst($query)
    {
        return $query->orderBy('created_at', 'desc');
    }

    public function scopeFilter($query)
    {
        if ($company_id = request('company_id')) {
            $query->where('company_id', $company_id);
        }
        if ($search = request('search')) {
            $query->where('first_name', 'LIKE', "%$search%");
        }
        return $query;
    }
}

/**
// create records
$company = Company::first()
$contact1 = new Contact();
$contact1->first_name = 'John';
$contact1->last_name = 'Doe';
$contact1->email = 'johndoe@test.com';
$contact1->address = 'john address';
$contact1->company_id = $company->id;
$contact1->save();
// or
$contact2 = new Contact();
$contact2->first_name = 'Jane';
$contact2->last_name = 'Doe';
$contact2->email = 'janedoe@test.com';
$contact2->address = 'jane address';
$company->contacts()->save($contact2);
// save model instances using relationship method
// 1
$contact1 = new Contact();
$contact1->first_name = 'John';
$contact1->last_name = 'Doe';
$contact1->email = 'johndoe@test.com';
$contact1->address = 'john address';
// 2
$contact2 = new Contact();
$contact2->first_name = 'Jane';
$contact2->last_name = 'Doe';
$contact2->email = 'janedoe@test.com';
$contact2->address = 'jane address';
$contacts = [ $contact1, $contact2 ];
$company->contacts()->saveMany($contacts);
// or
$contact3 = [
'first_name'=>'Mary',
'last_name'=>'Doe',
'email'=>'mary@test.com',
'address'=>'mary address'
];
$company->contacts()->create($contact3); // this is mass assignment
// or
// 1
$contact1 = new Contact();
$contact1->first_name = 'John';
$contact1->last_name = 'Doe';
$contact1->email = 'johndoe@test.com';
$contact1->address = 'john address';
// 2
$contact2 = new Contact();
$contact2->first_name = 'Jane';
$contact2->last_name = 'Doe';
$contact2->email = 'janedoe@test.com';
$contact2->address = 'jane address';
$contacts = [ $contact1, $contact2 ];
$company->contacts()->createMany($contacts); // this is mass assignment
*/

/**
// retrieve records
$company = Company::first();
$company->contacts()->get(); // returns Eloquent Collection
$company->contacts()->find(7);
$company->contacts()->orderBy('id', 'desc')->first();
// using property
$company->contacts; // returns Eloquent Collection
// or
$contact = Contact::first();
$contact->company(); // returns Illuminate\Database\Eloquent\Relations\BelongsTo
$contact->company; // return company instance
$contact->company()->first(); // returns company instance
$contact->company->name;
$contact->company->email;
*/

/**
// delete
$company = Company::first();
$company->contacts()->first()->delete();
$company->contacts()->delete();
// reload data - reloads the model and its relationship
$company->refresh();
*/