<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class BlogArticle extends Model
{
    protected $table='BlogArticle'; // Table Name
    protected $fillable=['title','content','id_auth']; // Fields in Table

    public function getAllBlogArticle(){
        return BlogArticle::all();
    }

}
