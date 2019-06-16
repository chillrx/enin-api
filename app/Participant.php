<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Participant extends Model
{
    use SoftDeletes;
    
    protected $guarded = ['deleted_at', 'created_at', 'updated_at'];
    protected $hidden = ['deleted_at', 'created_at', 'updated_at'];
    protected $fillable = ['profile_id', 'cnpj_number', 'trending_name', 'legal_person', 'company_size', 'employees_quantity', 'business_name', 'foundation_year', 'postal_code', 'address', 'number', 'city', 'state', 'district', 'company_email', 'company_site', 'company_interests', 'partner_profile', 'local_billing', 'sales_capacity', 'language', 'other_product'];

}
