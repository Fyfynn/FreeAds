<?php

namespace App\Http\Controllers;

use App\Models\Ad;
use App\Models\Image;
use Illuminate\Http\Request;

class AdController extends Controller
{
    // RETURN VIEW POUR SHOW ADS WITH A PAGINATION (A FINIR)
    public function index()
    {
        $ads = Ad::latest()->paginate(5);

        return view('index', compact('ads'))->with('i', (request()->input('page', 1) - 1) * 5);
    }

    // SHOW ADS WITH A PAGINATION (A FINIR)

    public function show(Ad $ad)
    {
        return view('show', compact('ad'));
    }

    // RETURN VIEW POUR CREATE ADS (COMPLETE)

    public function create()
    {
        if(auth()->guest()) {

            return view('login');
        }
        $ads = Ad::all();
        return view('create', ['ads' => $ads]);
    }

    // CREATE ADS (COMPLETE)

    public function store(Request $request)
    {

        if ($request->hasFile("image")) {
            $file = $request->file("image");
            $imageName = time() . '_' . $file->getClientOriginalExtension();
            $file->move(\public_path("image/"), $imageName);
        }

        $ad = new Ad([
            "user_id" => auth()->id(),
            "title" => $request->title,
            "description" => $request->description,
            "price" => $request->price,
            "category" => $request->category,
            "localisation" => $request->localisation,
            "image" => $imageName,
        ]);
        $ad->save();

        if ($request->hasFile("images")) {
            $files = $request->file("images");
            foreach ($files as $file) {
                $profileImg = time() . "_" . $file->getClientOriginalExtension();
                $file->move(\public_path('images/'), $profileImg);
                // $request['ad_id']=$ad->id;
                $img = new Image([
                    'ad_id' => $ad->id,
                    'name' => $profileImg
                ]);
                $img->save();
            }
        }

        return redirect('admin')->with('success', 'Ad created successfully.');
    }

    // RETURN VIEW EDIT ADS (A FINIR 95%)

    public function edit(Ad $ad)
    {
        return view('edit', compact('ad'));
    }

    // EDIT ADS (A FINIR 95%)

    public function update(Request $request, Ad $ad)
    {
        $input = $request->all();

        if ($img = $request->file("image")) {
            $imageName = time() . '_' . $img->getClientOriginalExtension();
            $img->move(\public_path("image/"), $imageName);
            $input['image'] = $imageName;
        } else {
            unset($input['image']);
        }

        $ad->update($input);

        return redirect('admin')->with('success', 'Ad updated successfully');
    }

    public function search(Request $request)
    {
        $key = trim($request->get('q'));

        $ads = Ad::query()
        ->where('title', 'LIKE', "%{$key}%")
        ->orWhere('category', 'LIKE', "%{$key}%")
        ->orWhere('localisation', 'LIKE', "%{$key}%")
        ->orderBy('created_at', 'desc')
        ->get();

        

        return view('search', [
            'key' => $key,
            'ads' => $ads,
        ]);
    }
    


    // DELETE ADS (COMPLETE)

    public function destroy(Ad $ad)
    {
        $ad->delete();

        return redirect('admin')->with('success', 'Ad deleted successfully');
    }
}
