<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Beverage;
use App\Tag;

class BeverageController extends Controller
{
    /**
     * Display the specified resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function show(int $id)
    {
        $beverage = Beverage::findOrFail($id);
        $tags = $beverage->tags()->get()->map(
            function ($tag) {
                return ['name'=>$tag->name, 'type'=>$tag->type];
            }
        )->all();
        return view('beverages.show', compact('beverage', 'tags'));
    }

    /**
     * Display the specified resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function reviews()
    {
        // TODO: Add beverage model
        return view('beverages.reviews.index');
    }

    /**
     * Add specified tag to this beverage resource.
     *
     * @param  Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function addTag(Request $request, int $id)
    {
        $beverage = Beverage::findOrFail($id);
        /* @var $ary_tags int[] */
        $ary_tags = $beverage->tags()->get()->map(
            function ($tag) {
                return $tag->name;
            }
        )->all();
        $tagName = $request->input('name');
        if (in_array($tagName, $ary_tags)) {
            return response()->json(
                ['status' => 'error', 'message' => 'Tag already exists.'],
                400
            );
        }
        $user_id = \Auth::id();
        $tag = Tag::firstOrCreate(
            ['name' => $tagName],
            ['name_en' => $tagName, 'type' => 1, 'user_id' => $user_id]
        );
        /* カテゴリタグの追加はできない */
        if ($tag->type != 1) {
            return response()->json(
                [
                    'status' => 'error',
                    'message' => "You can't add category tag to specified resource."
                ],
                401
            );
        }
        $beverage->tags()->attach($tag->id, ['user_id' => $user_id]);
        return response()->json(
            ['status' => 'success']
        );
    }

    /**
     * Remove specified tag from beverage resource.
     *
     * @param  Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function removeTag(Request $request, int $id)
    {
        $beverage = Beverage::findOrFail($id);
        /* @var $ary_tags int[] */
        $ary_tags = $beverage->tags()->get()->map(
            function ($tag) {
                return $tag->name;
            }
        )->all();
        /* @var $tagName string|null */
        $tagName = $request->input('name');
        if (!in_array($tagName, $ary_tags)) {
            return response()->json(
                [
                    'status' => 'error',
                    'message' => 'Tag was not attached to the specified resource.'
                ],
                400
            );
        }
        /* @var $user_id int */
        $user_id = \Auth::id();
        /* @var $tag Tag */
        $tag = Tag::where('name', $tagName)->get()->first();
        if ($tag == NULL) {
            return response()->json(
                [
                    'status' => 'error',
                    'message' => 'Tag was not attached to the specified resource.'
                ],
                400
            );
        }
        /* カテゴリタグの消去はできない */
        if ($tag->type != 1) {
            return response()->json(
                [
                    'status' => 'error',
                    'message' => "You can't remove category tag from specified resource."
                ],
                401
            );
        }
        $beverage->tags()->detach($tag->id);
        return response()->json(
            ['status' => 'success']
        );
    }
}
