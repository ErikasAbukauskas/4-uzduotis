<?php

namespace App\Http\Controllers;

use App\Company;

use App\Contact;


use Illuminate\Http\Request;

class CompanyController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $companies = Company::all();
        return view("company.index", ["companies" => $companies]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {

        $contacts = Contact::all();
        return view("company.create", ["contacts" => $contacts]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $company = new Company;

        $company->title = $request->company_title;
        $company->description = $request->company_description;
        $company-> logo = $request->company_logo;
        $company-> contact_id = $request->contact_company;

        if($request->has('company_logo')){
            $imageName = time().'.'.$request->company_logo->extension();
            $company->logo= '/images/'.$imageName; // atvaizdavimui prirasome '/images/.
            //paveiksliukas isikele i duomenu baze

            // 2. turiu kazkur ikelti/patalpinti paveiksliuka

            $request->company_logo->move(public_path('images'), $imageName);
            // irasome teksta koki inputui daveme pavadinima - name="student_imageurl"
            // perkles dokumenta kuris yra is formos i images aplanka
            // bus perkeltas i public aplanka kur yra images
        } else {
            $company->logo= '/images/placeholder.png';
        //     // pirma reikia isikelti paveiksliuka i images folderi su pavadinimu placeholder.png (gali buti kitas pavadinimas)
        }

        $company->save();

        return redirect()->route("company.index");
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Company  $company
     * @return \Illuminate\Http\Response
     */
    public function show(Company $company)
    {
        $types = $company->typeCompany;

        $types_count = $types->count();

        return view("company.show", ["company" => $company, "types"=> $types, "types_count" => $types_count]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Company  $company
     * @return \Illuminate\Http\Response
     */
    public function edit(Company $company)
    {
        $contacts = Contact::all();
        return view("company.edit", ["company" => $company, "contacts"=>$contacts]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Company  $company
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Company $company)
    {
        $company->title = $request->company_title;
        $company->description = $request->company_description;
        $company-> logo = $request->company_logo;
        $company-> contact_id = $request->contact_company;

        if($request->has('company_logo')){
            $imageName = time().'.'.$request->company_logo->extension();
            $company->logo= '/images/'.$imageName; // atvaizdavimui prirasome '/images/.
            //paveiksliukas isikele i duomenu baze

            // 2. turiu kazkur ikelti/patalpinti paveiksliuka

            $request->company_logo->move(public_path('images'), $imageName);
            // irasome teksta koki inputui daveme pavadinima - name="student_imageurl"
            // perkles dokumenta kuris yra is formos i images aplanka
            // bus perkeltas i public aplanka kur yra images
        }

        $company->save();

        return redirect()->route("company.index");
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Company  $company
     * @return \Illuminate\Http\Response
     */
    public function destroy(Company $company, Request $request)
    {


        $types_count = $company->typeCompany->count();


        if($types_count!=0) {
            return redirect()->route("company.index")->with('error_message', 'Negalima istrinti, nes companija turi tipu');
        }

        $company->delete();
        return redirect()->route("company.index")->with('success_message','Istrinta sekmingai');
    }
}
