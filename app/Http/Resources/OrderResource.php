<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class OrderResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array|\Illuminate\Contracts\Support\Arrayable|\JsonSerializable
     */
    public function toArray($request)
    {
        return [
            'order_id'   => $this->order->id,
            'client_name' => $this->order->name,
            'client_phone' => $this->order->phone,
            'client_Area'  => $this->order->area ?? 'Null',
            'client_city'  => $this->order->city ?? 'Null',
            'client_street'  => $this->order->street ?? 'Null',
            'client_morning'  => $this->order->morning ?? 'Null',
            'client_night'  => $this->order->night ?? 'Null',
            'client_morning_night'  => $this->order->morning_night ?? 'Null',
            'client_address'  => $this->order->address ?? 'Null',
            'client_problem_image'  => $this->order->image ?? 'Null',
            'client_battary'  => $this->order->battary ?? 'Null',
            'client_inverter'  => $this->order->inverter ?? 'Null',
            'client_solar_bords'  => $this->order->solar ?? 'Null',
            'client_problem_description'  => $this->order->problem ?? 'Null',
            'client_extra_description'  => $this->order->extra_des ?? 'Null',
            'client_devices'  => $this->order->devices ?? 'Null',
            'maintanance_type'  => $this->order->main->name ?? 'Null',
        ];
    }
}
