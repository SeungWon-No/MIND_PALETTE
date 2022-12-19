<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * @property mixed $mbAgreePK
 * @property mixed|string $agree1
 * @property mixed|string $agree2
 * @property mixed|string $updateDate
 * @property mixed|string $createDate
 */
class MemberAgree extends Model
{
    protected $table = 'memberAgree';
    protected $primaryKey = 'mbAgreePK';
    public $timestamps = false;

}
