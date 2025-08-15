<?php



namespace App\Models;



use Illuminate\Contracts\Auth\MustVerifyEmail;

use Illuminate\Database\Eloquent\Factories\HasFactory;

use Illuminate\Foundation\Auth\User as Authenticatable;

use Illuminate\Notifications\Notifiable;

use Laravel\Sanctum\HasApiTokens;
   use App\Notifications\CustomVerifyEmail;
use Illuminate\Database\Eloquent\Casts\Attribute;



class User extends Authenticatable implements MustVerifyEmail

{

    use HasApiTokens, HasFactory, Notifiable;



    /**

     * The attributes that are mass assignable.

     *

     * @var array

     */


public function sendEmailVerificationNotification()
{
    $this->notify(new CustomVerifyEmail);
}


    protected $fillable = [

        'name',

        'email',

        'password',

        'type',

        'resume',

         'photo',

    ];



    /**

     * The attributes that should be hidden for serialization.

     *

     * @var array

     */

    protected $hidden = [

        'password',

        'remember_token',

    ];



    /**

     * The attributes that should be cast.

     *

     * @var array

     */

    protected $casts = [

        'email_verified_at' => 'datetime',

    ];



    /**

     * Interact with the user's first name.

     *

     * @param  string  $value

     * @return \Illuminate\Database\Eloquent\Casts\Attribute

     */

    protected function type(): Attribute

    {

        return new Attribute(

            get: fn ($value) =>  ["user", "admin", "employee","type"][$value],

        );

    }
    public function jobs()
{
    return $this->hasMany(Job::class, 'employer_id');
}

public function applications()
{
    return $this->hasMany(Application::class);
}

}
