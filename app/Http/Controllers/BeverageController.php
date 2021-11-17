<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use App\Beverage;
use App\BeverageTag;
use App\Tag;

class BeverageController extends Controller
{
    /**
     * Display the specified resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $beverage = Beverage::findOrFail($id);
        // get()した結果はObjectのため、map_array()で配列に変換できない
        $db_tags = $beverage->tags()->get();
        $ary_tags = [];
        foreach($db_tags as $tag ) {
            $ary_tags[] = $tag->name;
        }
        $tags = implode(', ', $ary_tags);
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
    public function addTag(Request $request, $id){
        $beverage = Beverage::findOrFail($id);
        $db_tags = $beverage->tags()->get();
        $ary_tags = [];
        foreach($db_tags as $tag ) {
            $ary_tags[] = $tag->name;
        }
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
        $beverage_tag = BeverageTag::create([
            'beverage_id' => $id,
            'tag_id' => $tag->id,
            'user_id' => $user_id
        ]);
        $beverage_tag->save();
        return response()->json(
            ['status' => 'success']
        );
    }
}
