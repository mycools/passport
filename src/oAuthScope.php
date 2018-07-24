<?php

namespace Mycools\Passport;

use Illuminate\Database\Eloquent\Model;

class oAuthScope extends Model
{
    protected $table = "oauth_scopes";
    protected $fillable = [
        'scope',
        'scope_description',
    ];
    protected $dates = [
	    'birth_date'
    ];
    
}
