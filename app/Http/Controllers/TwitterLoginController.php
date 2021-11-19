<?php
namespace App\Http\Controllers;
use Laravel\Socialite\Facades\Socialite;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;
use App\User;
use Exception;

class TwitterLoginController extends Controller
{
     /**
      * Twitterの認証ページヘユーザーをリダイレクト
      *
      * @return \Illuminate\Http\Response
      */
      public function redirectToProvider(){
          return Socialite::driver('twitter')->redirect();
      }
      /**
       * Twitterからユーザー情報を取得(Callback先)
       *
       * @return \Illuminate\Http\Response
      */
      public function handleProviderCallback()
      {
        try {
            $twitterUser = Socialite::driver('twitter')->user();
        } catch (Exception $e) {
            return redirect('auth/twitter');
        }
         if(User::where('email', $twitterUser->getEmail())->exists()){
            //ツイッターで作成されたユーザーならそのままパスする
            $user = User::where('email', $twitterUser->getEmail())->first();
         }else{
            $user = new User();
            //ユーザーに必要な情報
            $user->name = $twitterUser->getNickname();
            $user->email = $twitterUser->getEmail();
            $user->password = md5(Str::uuid());
            $user->twitter = true;
            $user->twitter_id = $twitterUser->getName();
            $user->twitter_avatar = $twitterUser->getAvatar();
            $user->save();
         }
         Auth::login($user);
         return redirect('/');
      }
 }