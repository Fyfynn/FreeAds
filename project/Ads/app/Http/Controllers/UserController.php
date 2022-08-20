<?php

namespace App\Http\Controllers;

use App\Models\Ad;
use App\Models\User;
use Illuminate\Support\Arr;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;


class UserController extends Controller
{
    //
    public function index()
    {
        $users = User::latest()->paginate(5);

        return view('showUsers', compact('users'))->with('i', (request()->input('page', 1) - 1) * 5);
    }

                                                        // SHOW UserS WITH A PAGINATION (A FINIR)

    public function show(User $user)
    {
        return view('showUsers', compact('user'));
    }

                                                        // RETURN VIEW POUR CREATE UserS (COMPLETE)

    public function register()
    {
        return view('register')->with('success', 'You have received an email confirmation !');
    }

                                                        // CREATE UserS (COMPLETE)

    public function store(Request $request)
    {
        request()->validate([
            'name' => 'required',
            'email' => 'required|email',
            'password' => 'required|confirmed',
            'password_confirmation' => 'required|same:password'
        ]);

        $user = new User([
            "name" => $request->name,
            "email" => $request->email,
            "password" => bcrypt($request->password),
        ]);

        $user->save();

        return view('register');

    }

    public function login() 
    {
        return view('login');
    }

    public function connect(Request $request) 
    {
        request()->validate([
            'email' => ['required', 'email'],
            'password' => ['required']
        ]);

        // fct predef try/test -> connection / attempts = take array with parameters users
        $result = auth()->attempt([
            'email' => request('email'),
            'password' => request('password')
        ]);

        if ($result)
        {

            return redirect('account')->with('success', 'You\'re connected !');
        }
        return back()->withInput()->withErrors([
            'email' => 'Your informations are incorrect',
        ]);
    }

    /**
     * Get the column name for the "remember me" token.
     *
     * @return string
     */
    public function getRememberTokenName()
    {
        return '';
    }

    public function update(Request $request)
    {
        $this->validate($request, [
            'password' => 'required|confirmed',
            'password_confirmation' => 'required',
        ]);
        
        $input = $request->all();
        if(!empty($input['password'])){ 
            $input['password'] = bcrypt($input['password']);
        }else{
            $input = Arr::except($input,array('password'));    
        }
        $user = $request->user();
        $user->update($input);
        
        return redirect('account')->with('success','User updated successfully');
    }
}

    // RETURN VIEW EDIT UserS (A FINIR 95%)

    // public function edit(User $user)
    // {
    //     return view('edit', compact('user'));
    // }

    //                                                     // EDIT UserS (A FINIR 95%)
    
    // public function update(Request $request, User $User)
    // {
    //     if ($request->hasFile("image")) {
    //         $file = $request->file("image");
    //         $imageName = time() . '_' . $file->getClientOriginalExtension();
    //         $file->move(\public_path("image/"), $imageName);
    //     }

    //     $User = new User([
    //         "title" => $request->title,
    //         "description" => $request->description,
    //         "price" => $request->price,
    //         "category" => $request->category,
    //         "localisation" => $request->localisation,
    //         "image" => $imageName,
    //     ]);
    //     $User->save();

    //     if ($request->hasFile("images")) {
    //         $files = $request->file("images");
    //         foreach ($files as $file) {
    //             $profileImg = time() . "_" . $file->getClientOriginalExtension();
    //             $file->move(\public_path('images/'), $profileImg);
    //             // $request['User_id']=$User->id;
    //             $img = new Image([
    //                 'User_id' => $User->id,
    //                 'name' => $profileImg
    //             ]);
    //             $img->save();
    //         }
    //     }

    //     return redirect()->route('Users.index')
    //         ->with('success', 'User updated successfully');
    // }


    //                                                     // DELETE UserS (COMPLETE)

    // public function destroy(User $User)
    // {
    //     $User->delete();

    //     return redirect()->route('Users.index')
    //         ->with('success', 'User deleted successfully');
    // } 
