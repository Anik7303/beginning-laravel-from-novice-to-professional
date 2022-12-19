<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Company extends Model
{
    use HasFactory;
    // protected $table = "companies" // customize table name
    // protected $guarded = []; // guarded properties
    protected $fillable = ['name', 'address', 'website', 'email']; // fillable properties

    public function contacts()
    {
        return $this->hasMany(Contact::class);
    }
}

/**
use App\Models\Company;
// read entries from database
Company::take(3)->get()
Company::take(3)->get()->all()
Company::find(1)
Company::find([1,2,3])->all()
Company::where('email', 'x@x.c')->first()
Company::where('email', 'x@x.c')->get()->all()
Company::whereEmail('x@x.c')->first()
Company::whereEmail('x@x.c')->get()->all()
// create new entry
$company = new Company()
$company->name = "Company #"
$company->address = "Address ${$company->name}"
$company->website = "Website ${$company->name}"
$company->email = "Email ${$company->name}"
$company->save()
// update an entry
$company = Company::find(2)->first()
$company->name = 'example@test.com'
$company->save();
// delete on entry
$company = Company::find(1)
$company->delete()
Company::destroy(1)
Company::destroy([3, 4])
*/