<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\CompanyProfile;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Validator;

class CompanyProfileController extends Controller
{
    public function index()
    {
        $companyProfile = CompanyProfile::first();
        // dd($companyProfile);
        return view('admin.pages.company-profile', compact('companyProfile'));
    }

    public function create()
    {
        return view('admin.company_profiles.create');
    }

    public function store(Request $request)
    {
       
        $validator = Validator::make($request->all(), [
            'name' => 'required|string',
            'description' => 'nullable|string',
            'address' => 'nullable|string',
            'phone' => 'nullable|string',
            'email' => 'nullable|email',
            'website' => 'nullable',
            'logo' => 'nullable|image',
        ]);
        // dd( $validator );
        if ($validator->fails()) {
            return redirect()->back()->with('error', 'Please fill Fields');
        }
        $companyProfile =  new CompanyProfile();
        $companyProfile->name = $request->name;
        $companyProfile->email = $request->email;
        $companyProfile->address = $request->address;
        $companyProfile->description = $request->description;
        $companyProfile->phone = $request->phone;
        $companyProfile->website = $request->website;
        // upload image in database 
        if ($request->hasFile('logo')) {
            $logo = $request->file('logo');
            $logoName = time() . '.' . $logo->getClientOriginalExtension();
            $logo->move(public_path('admin-assets/picture'), $logoName);
            $companyProfile->logo = $logoName;
        }
        else{
            $companyProfile->logo = 'no-image.png';
        }
        $companyProfile->save();

        return redirect()->route('admin.index')->with('success', 'Company profile created successfully.');
       
    }

    public function edit()
    {
        $companyProfile = CompanyProfile::orderBy('id', 'DESC')->first();
        return  response()->json([
            'status' => 200,
            'companyProfile' => $companyProfile
        ]);
    }

    public function update(Request $request)
    {
        //   dd($request->all());
        $companyProfile = CompanyProfile::find($request->editId);
        $companyProfile->name = $request->name;
        $companyProfile->email = $request->email;
        $companyProfile->address = $request->address;
        $companyProfile->description = $request->description;
        $companyProfile->phone = $request->phone;
        $companyProfile->website = $request->website;
        // upload image in database 
        if ($request->hasFile('logo')) {
            $logo = $request->file('logo');
            $logoName = time() . '.' . $logo->getClientOriginalExtension();
            $logo->move(public_path('admin-assets/picture'), $logoName);
            $companyProfile->logo = $logoName;
        }
        $companyProfile->update();

        return redirect()->route('admin.index')->with('success', 'Company profile updated successfully.');
    }

    public function destroy(Request $request)
    {
        // dd($request->id);
        $companyProfile = CompanyProfile::find($request->id);
        $path = 'admin-assets/picture/' . $companyProfile->logo;
        if (File::exists($path)) {
            File::delete($path);
        }

        $companyProfile->delete();

        return redirect()->route('admin.index')->with('success', 'Company profile deleted successfully.');
    }
}
