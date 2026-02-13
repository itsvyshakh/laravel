<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class testModel extends Model
{
    protected $fillable = [
        'payroll_month',
        'legal_entity_code',
        'currency',
        'batch_id',
        'posting_date',
        'status'
    ];

    public function components()
    {
        return $this->hasMany(PayrollComponentSummary::class);
    }

}
