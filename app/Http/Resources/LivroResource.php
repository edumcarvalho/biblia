<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class LivroResource extends JsonResource
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
            'id' => $this->id,
            'posicao' => $this->posicao,
            'nome' => $this->nome,
            'abreviacao' => $this->abreviacao,
            'testamento'=> $this->whenLoaded('testamento'),
            //aqui tras os relacionamentos
            'versiculos'=> new VersiculosCollection($this->whenLoaded('versiculos')),
            'versao'=> new VersaoResource($this->whenLoaded('versao')),

        ];
    }
}
