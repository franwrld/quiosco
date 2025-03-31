<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class CategoriaResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        // Aqui ponemos solo los campos que queremos retornar de tipo json
        return [
            'id' => $this->id,
            'nombre' => $this->nombre,
            'icono' => $this->icono
        ];
    }
}
