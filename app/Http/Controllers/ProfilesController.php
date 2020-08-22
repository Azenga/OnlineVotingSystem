<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;
use Intervention\Image\Facades\Image;
use Illuminate\Support\Facades\Storage;
use App\Http\Requests\UpdateProfileRequest;

class ProfilesController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\User  $user
     * @return \Illuminate\Http\Response
     */
    public function show(User $user)
    {
        return view('profile.show', compact('user'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\User  $user
     * @return \Illuminate\Http\Response
     */
    public function edit(User $user)
    {
        return view('profile.edit', compact('user'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateProfileRequest  $request
     * @param  \App\User  $user
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateProfileRequest $request, User $user)
    {
        //Update the username
        $user->update($request->validated());

        //Create a user profile not there yet
        if(is_null($user->profile)){
            $user->profile()->create();

            $user = $user->fresh();
        } 

        //Update the profile
        $user->fresh()->profile->update($request->validated());

        //Check if the request has an image
        if($request->hasFile('image')){

            //Check if the user previously had an image
            if(!is_null($user->profile->image)){

                //Delete the image
                $user->profile->image->deleteFilesFromStorage();

                //Delete the image record from the database
                $user->profile->image->delete();
            }

            //Upload the image
            $path = Storage::disk('s3')->put('uploads/images/profile', $request->file('image'));

            

            //Resize and crop the image to a uniform dimension
            //Image::make(public_path("storage/{$path}"))->fit(256, 256)->save();

            $user->profile->image()->create([
                'path' => $path,
            ]);
            
        }

        return redirect()->route('profile.show', $user);
    }

}
