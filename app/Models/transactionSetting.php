<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class transactionSetting extends Model
{
    protected $fillable = [
        'depositIsActive',
        'withdrawIsActive',
        'minDepositAmount',
        'maxDepositAmount',
        'minWithdrawAmount',
        'maxWithdrawAmount',
    ];
}
