<?php

// @formatter:off
/**
 * A helper file for your Eloquent Models
 * Copy the phpDocs from this file to the correct Model,
 * And remove them from this file, to prevent double declarations.
 *
 * @author Barry vd. Heuvel <barryvdh@gmail.com>
 */


namespace App{
/**
 * App\Beverage
 *
 * @property int $id
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property string $title 名称
 * @property string|null $description 説明文(管理者設定)
 * @property string|null $sell_start_on 発売日(おおよその日付)
 * @property string|null $sell_end_on 終売日(おおよその日付)
 * @property int $jan_code JANコード
 * @property int $user_id 登録者のユーザーID
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Image[] $images
 * @property-read int|null $images_count
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Rakuten[] $rakuten_products
 * @property-read int|null $rakuten_products_count
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Review[] $reviews
 * @property-read int|null $reviews_count
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Tag[] $tags
 * @property-read int|null $tags_count
 * @property-read \App\User $user
 * @method static \Illuminate\Database\Eloquent\Builder|Beverage newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Beverage newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Beverage query()
 * @method static \Illuminate\Database\Eloquent\Builder|Beverage whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Beverage whereDescription($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Beverage whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Beverage whereJanCode($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Beverage whereSellEndOn($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Beverage whereSellStartOn($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Beverage whereTitle($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Beverage whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Beverage whereUserId($value)
 */
	class Beverage extends \Eloquent {}
}

namespace App{
/**
 * App\BeverageTag
 *
 * @property int $id
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property int $beverage_id 飲み物ID
 * @property int $tag_id タグID
 * @property int $user_id 登録者のユーザーID
 * @property-read \App\Beverage $beverage
 * @property-read \App\Tag $tag
 * @property-read \App\User $user
 * @method static \Illuminate\Database\Eloquent\Builder|BeverageTag newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|BeverageTag newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|BeverageTag query()
 * @method static \Illuminate\Database\Eloquent\Builder|BeverageTag whereBeverageId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|BeverageTag whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|BeverageTag whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|BeverageTag whereTagId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|BeverageTag whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|BeverageTag whereUserId($value)
 */
	class BeverageTag extends \Eloquent {}
}

namespace App{
/**
 * App\Image
 *
 * @property int $id
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property int $order 表示順序
 * @property string $path 画像パス
 * @property string|null $thumbnail_large_path サムネイル(大)のパス
 * @property string|null $thumbnail_medium_path サムネイル(中)のパス
 * @property string|null $thumbnail_small_path サムネイル(小)のパス
 * @property int $user_id 登録者のユーザーID
 * @property string $image_target_type 画像の付与対象のテーブル
 * @property int $image_target_id 画像の付与対象のID
 * @property-read \App\User $author
 * @property-read \Illuminate\Database\Eloquent\Model|\Eloquent $target
 * @method static \Illuminate\Database\Eloquent\Builder|Image newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Image newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Image query()
 * @method static \Illuminate\Database\Eloquent\Builder|Image whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Image whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Image whereImageTargetId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Image whereImageTargetType($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Image whereOrder($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Image wherePath($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Image whereThumbnailLargePath($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Image whereThumbnailMediumPath($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Image whereThumbnailSmallPath($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Image whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Image whereUserId($value)
 */
	class Image extends \Eloquent {}
}

namespace App{
/**
 * App\Log
 *
 * @property int $id
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property string|null $body メモ(任意)
 * @property int $price 購入単価
 * @property int $count 購入本数
 * @property int $user_id 登録者のユーザーID
 * @property int $beverage_id レビュー対象の飲み物ID
 * @property string|null $deleted_at
 * @property-read \App\Beverage $beverage
 * @property-read \App\User $user
 * @method static \Illuminate\Database\Eloquent\Builder|Log newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Log newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Log query()
 * @method static \Illuminate\Database\Eloquent\Builder|Log whereBeverageId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Log whereBody($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Log whereCount($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Log whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Log whereDeletedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Log whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Log wherePrice($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Log whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Log whereUserId($value)
 */
	class Log extends \Eloquent {}
}

namespace App{
/**
 * App\Rakuten
 *
 * @property int $id
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property string $title 商品名
 * @property string $body 商品説明
 * @property string $url 商品URL
 * @property int $beverage_id 利用先の飲み物ID
 * @property-read \App\Beverage $beverage
 * @method static \Illuminate\Database\Eloquent\Builder|Rakuten newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Rakuten newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Rakuten query()
 * @method static \Illuminate\Database\Eloquent\Builder|Rakuten whereBeverageId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Rakuten whereBody($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Rakuten whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Rakuten whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Rakuten whereTitle($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Rakuten whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Rakuten whereUrl($value)
 */
	class Rakuten extends \Eloquent {}
}

namespace App{
/**
 * App\Review
 *
 * @property int $id
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property string $title レビュータイトル
 * @property float $star 評価(0.5単位)
 * @property string $body レビュー本文
 * @property int $user_id 登録者のユーザーID
 * @property int $beverage_id レビュー対象の飲み物ID
 * @property-read \App\Beverage $beverage
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Image[] $images
 * @property-read int|null $images_count
 * @property-read \App\User $user
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Vote[] $votes
 * @property-read int|null $votes_count
 * @method static \Illuminate\Database\Eloquent\Builder|Review newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Review newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Review query()
 * @method static \Illuminate\Database\Eloquent\Builder|Review whereBeverageId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Review whereBody($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Review whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Review whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Review whereStar($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Review whereTitle($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Review whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Review whereUserId($value)
 */
	class Review extends \Eloquent {}
}

namespace App{
/**
 * App\Tag
 *
 * @property int $id
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property int $type タグ種別ID 0:カテゴリ 1:タグ
 * @property string $name タグの日本語名
 * @property string $name_en タグの英名
 * @property int $user_id 登録者のユーザーID
 * @property-read \App\User $user
 * @method static \Illuminate\Database\Eloquent\Builder|Tag newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Tag newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Tag query()
 * @method static \Illuminate\Database\Eloquent\Builder|Tag whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Tag whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Tag whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Tag whereNameEn($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Tag whereType($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Tag whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Tag whereUserId($value)
 */
	class Tag extends \Eloquent {}
}

namespace App{
/**
 * App\User
 *
 * @property int $id
 * @property string $name
 * @property string $email
 * @property \Illuminate\Support\Carbon|null $email_verified_at
 * @property string $password
 * @property string|null $remember_token
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property int $twitter
 * @property string|null $twitter_id
 * @property string|null $twitter_avatar
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Log[] $logs
 * @property-read int|null $logs_count
 * @property-read \Illuminate\Notifications\DatabaseNotificationCollection|\Illuminate\Notifications\DatabaseNotification[] $notifications
 * @property-read int|null $notifications_count
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Review[] $reviews
 * @property-read int|null $reviews_count
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Vote[] $votes
 * @property-read int|null $votes_count
 * @method static \Illuminate\Database\Eloquent\Builder|User newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|User newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|User query()
 * @method static \Illuminate\Database\Eloquent\Builder|User whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereEmail($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereEmailVerifiedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User wherePassword($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereRememberToken($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereTwitter($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereTwitterAvatar($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereTwitterId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereUpdatedAt($value)
 */
	class User extends \Eloquent {}
}

namespace App{
/**
 * App\Vote
 *
 * @property int $id
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property int $votes UP(1)またはDOWN(-1)の投票
 * @property int $user_id 登録者のユーザーID
 * @property string $vote_target_type 投票の付与対象のテーブル
 * @property int $vote_target_id 投票の付与対象のID
 * @property-read \App\User $author
 * @property-read \Illuminate\Database\Eloquent\Model|\Eloquent $target
 * @method static \Illuminate\Database\Eloquent\Builder|Vote newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Vote newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Vote query()
 * @method static \Illuminate\Database\Eloquent\Builder|Vote whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Vote whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Vote whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Vote whereUserId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Vote whereVoteTargetId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Vote whereVoteTargetType($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Vote whereVotes($value)
 */
	class Vote extends \Eloquent {}
}

