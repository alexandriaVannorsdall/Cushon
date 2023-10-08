<?php

namespace App\Models;

use Database\Factories\CustomerFactory;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\ValidationException;

class Customer extends Model
{
    use HasFactory;

    /**
     * @var string[]
     */
    protected $fillable = [
        'id', 'account_name', 'account_id'
    ];

    /**
     * Creates a customer.
     *
     * @param array $data
     * @return Builder|Model
     * @throws ValidationException
     */
    public static function create(array $data): Model|Builder
    {
        $validatedData = Validator::make($data, [
            'account_name' => 'required',
            'account_id' => 'required|unique:customers',
        ])->validate();

        return self::query()->create($validatedData);
    }

    /**
     * @return CustomerFactory|Factory
     */
    protected static function newFactory(): Factory|CustomerFactory
    {
        return CustomerFactory::new();
    }
}
