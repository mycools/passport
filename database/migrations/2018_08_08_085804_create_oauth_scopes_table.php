<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateOauthScopesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
	    if (!Schema::hasTable('oauth_scopes')) {
	        Schema::create('oauth_scopes', function (Blueprint $table) {
	            $table->increments('id')->unsigned();
	            $table->text('scope',30)->index();
	            $table->text('scope_description');
	            $table->text('scope_preview');
	            $table->timestamps();
	            $table->softDeletes();
	        });
        }
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('oauth_scopes');
    }
}
