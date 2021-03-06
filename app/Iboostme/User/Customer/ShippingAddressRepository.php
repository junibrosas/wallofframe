<?php
namespace Iboostme\User\Customer;
use Iboostme\Email\EmailRepository;
use Illuminate\Support\Facades\Auth;
use ShippingAddress;
use User;
use Profile;
use UserType;
use Illuminate\Support\Facades\App;

class ShippingAddressRepository {
    // max number of addresses
    private $max = 3;

    public function add( $inputs ){
        $inputs['user_id'] = isset( $inputs['user_id'] ) ? $inputs['user_id'] : Auth::id();
        ShippingAddress::create( $inputs );
    }

    public function addUser( $input ){
        //$username = explode('@', $input['email']); // generated username
        /*$username = $input['username'];
        $password = $input['password'];*/
        //$input['password'] = $input['email']; // generated password

        /*$user = new User;
        $user->username = $username;
        $user->email = $input['email'];
        $user->type_id = UserType::where('slug', 'customer')->first()->id;
        $user->password = $password;
        $user->password_confirmation = $password;
        $user->confirmation_code = md5(uniqid(mt_rand(), true));
        $user->confirmed = 1;

        $user->save();*/

        $repo = App::make('UserRepository');
        $user = $repo->signup( $input );
        if($user->id){
            $input['user_id'] = $user->id;
            Profile::create( $input );
            ShippingAddress::create( $input );
        }

        return $user;
    }

    public function isMax( User $user ){
        $addresses = ShippingAddress::where('user_id', $user->id)->get();
        if($addresses->count() >= $this->max){
            return true;
        }
        return false;
    }

    public function hasAddresses( User $user ){
        $addresses = ShippingAddress::where('user_id', $user->id)->get();
        if($addresses->count() > 0){
            return true;
        }
        return false;
    }
} 