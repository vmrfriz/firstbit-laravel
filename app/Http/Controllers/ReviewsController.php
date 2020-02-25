<?php

namespace App\Http\Controllers;

use App\Review;
use Illuminate\Http\Request;
use \Carbon\Carbon;
use Illuminate\Support\Facades\Storage;
use \Intervention\Image\ImageManagerStatic as Image;

class ReviewsController extends Controller
{

    public function __construct() {
        // $this->middleware('auth', ['except' => ['index', 'store']]);
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        Carbon::setLocale('ru');
        $reviews = Review::orderBy('created_at', 'desc')->get();
        foreach ($reviews as &$review) {
            $review['created_at_diff'] = str_replace('до', 'назад', Carbon::parse($review->created_at)->diffForHumans(Carbon::now()));
            $review['is_edited'] = $review->created_at->toDateTimeString() !== $review->updated_at->toDateTimeString();
        }
        return view('index', ['reviews' => $reviews]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validatedData = $this->validate($request, [
            'author' => 'required|max:255',
            'email' => 'required|email|max:255',
            'text' => 'required|min:7',
            'image' => 'nullable|file|mimetypes:image/gif,image/png,image/jpeg',
        ]);
        if ($request->hasFile('image') && $request->file('image')->isValid()) {
            $image = Image::make($request->image);
            $width = 320;
            $height = 240;
            ($image->width() - $width) > ($image->height() - $height) ? $height=null : $width=null;
            $image->resize($width, $height, function ($constraint) {
                $constraint->aspectRatio();
            });
            $image->stream();

            $image_extension = $request->image->getClientOriginalExtension();
            $image_filename = time() . '_' . rand(100000, 999999);
            $image_path = 'images/reviews/' . $image_filename . '.' . $image_extension;
            Storage::disk('public')->put($image_path, $image);
            $validatedData['image'] = '/storage/' . $image_path;
        }
        $review = Review::create($validatedData);
        return redirect('/')->with(['info' => ['Ваш отзыв отправлен на модерацию']]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Review  $review
     * @return \Illuminate\Http\Response
     */
    public function edit(Review $review)
    {
        return view('edit', compact('review'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Review  $review
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Review $review)
    {
        $validatedData = $this->validate($request, [
            'text' => 'required|min:7',
        ]);
        $review->update(['text' => $validatedData['text']]);
        return redirect('/')->with(['info' => ['Успешно обновлено']]);
    }

    public function publish(Request $request) {
        return '213';
    }
}
