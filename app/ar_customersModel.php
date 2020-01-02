<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ar_customersModel extends Model
{
    protected $table = 'ar_customers';
    protected $primaryKey = 'CustomerID';
    protected $fillable = ['CustomerCode', 'CustomerName', 'BillingAddressLine1', 'BillingAddressLine2', 'BillingCity', 'BillingState', 'BillingCountry', 'BillingZipCode', 'ShippingCity', 'Phone', 'Fax', 'Email', 'Website', 'NPWP', 'created_at', 'updated_at', 'created_by', 'updated_by'];
}
