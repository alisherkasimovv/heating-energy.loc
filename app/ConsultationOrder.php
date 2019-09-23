<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

/**
 * Class ConsultationOrder
 * @package App
 * @author Alisher Kasimov
 */
class ConsultationOrder extends Model
{
    protected $fillable = [
        'name',
        'phone',
        'accepted'
    ];

    public static function add($fields)
    {
        $consultationOrder = new static;

        $consultationOrder->name = $fields['name'];
        $consultationOrder->phone = $fields['phone'];

        $consultationOrder->save();

        return $consultationOrder;
    }

    public function acceptOrder()
    {
        $this->accepted = true;
        $this->save();
    }
}
