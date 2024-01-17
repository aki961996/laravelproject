<?php

namespace App\Http\Controllers;

use App\Models\Listing;
use Clockwork\Storage\Storage;

use Illuminate\Contracts\Encryption\DecryptException;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage as FacadesStorage;
use Illuminate\Validation\Rule;
use PhpParser\Node\Expr\List_;

use Illuminate\Support\Facades\File;

class ListingController extends Controller
{
    //show all listing 
    public function index()
    {
        //dd(request('search'));
        // $tag = request('tag');
        //dd($tag);
        // dd(Listing::latest()->filter(request(['tag', 'search']))->paginate(4));

        //dd(Listing::latest()->filter(request(['tag', 'search']))->paginate(3));
        return view('Listings.index', [
            // 'heading' => 'Latest Heading', //This is we can pass heading and some data also
            'listings' => Listing::latest()->filter(request(['tag', 'search']))->paginate(4),
        ]);
    }

    //show single listing
    public function show($id)
    {
        // $id =  decrypt($id);
        // return view('Listings.show', [
        //     'listing' => Listing::find($id)
        // ]);
        try {
            $id =  decrypt($id);
            return view('Listings.show', [
                'listing' => Listing::find($id)
            ]);
        } catch (DecryptException $e) {
            abort(404); // or handle the decryption failure in some way
        }
    }

    //show create From
    public function create()
    {
        return view('Listings.create');
    }

    //insert data from the from
    public function store(Request $request)
    {

        $formFieldz = $request->validate([
            'company' => ['required', Rule::unique('listings', 'company')],
            'title' => 'required',
            'location' => 'required',
            'website' => 'required',
            'email' => ['required', 'email'],
            'tag' => 'required',
            'description' => 'required',
        ]);
        //dd($request->hasFile('logo')); //file undel
        if ($request->hasFile('logo')) {
            //$logo = $request->file('logo');
            $formFieldz['logo'] = $request->file('logo')->store('logos', 'public');
        }
        Listing::create($formFieldz);
        return redirect('/')->with('message', 'Job inserted successfully!');
    }


    //Show edit form
    public function edit($listing)
    {
        try {
            $id = decrypt($listing);
            $list = Listing::find($id);
            return view('Listings.edit', ['listing' => $list]);
        } catch (DecryptException $e) {
            abort(404); // or handle the decryption failure in some way
        }
    }

    //Update Listing Data

    public function update(Request $request, Listing $listing)
    {

        //dd($listing);
        //make sure first Listing is the model
        $formFieldz = $request->validate([
            'company' => ['required'],
            'title' => 'required',
            'location' => 'required',
            'website' => 'required',
            'email' => ['required'],
            'tag' => 'required',
            'description' => 'required',
        ]);

        if ($request->hasFile('logo')) {
            $formFieldz['logo'] = $request->file('logo')->store('logos', 'public');
        }

        $listing->update($formFieldz);
        return back()->with('message', 'Listing updated successfully!');
    }

    //deleting list

    public function destroy(Request $request, Listing $listing)
    {

        if ($listing->logo && File::exists(public_path('storage/' . $listing->logo))) {
            File::delete(public_path('storage/' . $listing->logo));
        }
        $listing->delete();
        return redirect('/')->with('message', 'Listing deleted successfully');
    }
}
