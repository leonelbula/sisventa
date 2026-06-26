<?php

namespace App\DTOs;

class SupplierDTO
{
    public function __construct(
        public readonly string $document_type,
        public readonly string $document_number,
        public readonly string $name,
        public readonly ?string $company_name,
        public readonly ?string $phone,
        public readonly ?string $email,
        public readonly ?string $address,
        public readonly bool $status,
        public readonly ?string $observation,
    ) {}

    public static function fromRequest(
        $request
    ): self {

        return new self(
            document_type: $request->document_type,
            document_number: $request->document_number,
            name: $request->name,
            company_name: $request->company_name,
            phone: $request->phone,
            email: $request->email,
            address: $request->address,
            status: $request->boolean('status'),
            observation: $request->observation,
        );
    }

    public function toArray(): array
    {
        return get_object_vars($this);
    }
}
