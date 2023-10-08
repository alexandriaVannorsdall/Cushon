<?php

namespace App\Models;

use Database\Factories\AccountsFactory;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Accounts extends Model
{
    use HasFactory;

    /**
     * @var string[]
     */
    protected $fillable = [
        'id', 'customer_id', 'account_name', 'account_id', 'type', 'balance', 'opened_at'
    ];

    /**
     * The factory instance associated with the model.
     *
     * @var AccountsFactory
     */
    protected $factory = AccountsFactory::class;

    /**
     * @param $accountId
     * @return mixed
     */
    public static function search($accountId): mixed
    {
        return Accounts::find($accountId);
    }
}
