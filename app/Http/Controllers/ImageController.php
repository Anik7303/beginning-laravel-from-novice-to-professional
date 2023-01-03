<?php

namespace App\Http\Controllers;

use App\Models\Image;
use Illuminate\Http\Request;
use App\Http\Requests\ImageRequest;

class ImageController extends Controller
{
    /**
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function index()
    {
        $images = Image::published()->latest()->paginate(15);
        return view('images.index', compact('images'));
    }

    /**
     * 
     * @param Image $image Image model
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function show(Image $image)
    {
        return view('images.show', compact('image'));
    }

    /**
     * 
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function create()
    {
        return view('images.create');
    }

    /**
     * 
     * @param ImageRequest $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(ImageRequest $request)
    {
        // dd($request->validated());
        Image::create($request->getData());
        // Image::create($request->validated());
        return to_route('images.index')->with('message', 'Image uploaded successfully');
    }

    /**
     * 
     * @param Image $image Image model
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function edit(Image $image)
    {
        return view('images.edit', compact('image'));
    }

    /**
     * 
     * @param ImageRequest $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function update(ImageRequest $request, Image $image)
    {
        $image->update($request->getData());
        return to_route('images.index')->with('message', 'Image updated successfully');
    }

    public function destroy(Image $image)
    {
        $image->delete();
        return to_route('images.index')->with('message', 'Image has been deleted successfully');
    }
}