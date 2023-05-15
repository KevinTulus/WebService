<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class PostResource extends JsonResource
{
    // mendefinisikan properti status dan massage
    public $status;
    public $message;

    /**
     * __construct
     *
     * @param mixed $status
     * @param mixed $message
     * @param mixed $resource
     * @return void
     */

    public function __construct($status, $message, $resource)
    {
        // memanggil parent construct
        parent::__construct($resource);
        // mengisi properti status dan massage
        $this->status = $status;
        $this->message = $message;
    }

    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */

    public function toArray($request)
    {
        return [
            'status' => $this->status,
            'message' => $this->message,
            'data' => $this->resource,
        ];
    }

    // public function toArray(Request $request): array
    // {
    //     return parent::toArray($request);
    // }
}
