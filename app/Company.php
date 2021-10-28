<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Company extends Model
{
    public function typeCompany() {
        return $this->hasMany(Type::class, 'company_id','id');
    }

    public function companyContact() {
        return $this->belongsTo(Contact::class, 'contact_id', 'id');
    }
}
