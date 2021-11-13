<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Vacancie extends Model
{
   protected $fillable = [
        'title', 'description', 'image', 'skills', 'Activa', 'categorie_id',
        'experience_id', 'ubication_id', 'salary_id'
    ];

    //Relacion 1:1 categoria y vacante
    public function categorie()
    {
        return $this->belongsTo('App\Models\Categorie' );
    }

    //Relacion 1:1 salario y vacante
    public function salary()
    {
        return $this->belongsTo('App\Models\Salarie' );
    }

    //Relacion 1:1 ubicacion y vacante
    public function ubication()
    {
        return $this->belongsTo('App\Models\Ubication');
    }

    //Relacion 1:1 experien cia y vacante
    public function experience()
    {
        return $this->belongsTo('App\Models\Experience' );
    }

    //relacion 1:1 reclutador y vacante
    public function recruiters()
    {
        return $this->belongsTo('App\Models\User', 'user_id' );
    }

    //relacion de 1:n candidato a vacante
    public function candidate()
    {
        return $this->hasMany('App\Models\Candidate');
    }
}
