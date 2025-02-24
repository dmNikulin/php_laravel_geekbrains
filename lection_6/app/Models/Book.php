<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Book extends Model
{
    /** @use HasFactory<\Database\Factories\BookFactory> */
    use HasFactory;

    public $fillable = ['title','author','genre'];
    
    // public function up() {
    //     Schema::create('books', function (Blueprint $table) {
    //         $table->id();
    //         $table->string('title');
    //         $table->string('author');
    //         $table->string('genre');
    //         $table->timestamps();
    //     });
    // }


}
