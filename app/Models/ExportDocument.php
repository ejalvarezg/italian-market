<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class ExportDocument extends Model
{    public $timestamps = false;
    protected $table = 'export_documents';
    protected $primaryKey = 'document_id';
    protected $fillable = [
        'shipment_id',
        'document_type',
        'customs_declaration_num',
        'approval_status',
        'issued_country',
        'issue_date',
        'file_url',
    ];

    protected function casts(): array
    {
        return [
            'issue_date' => 'date',
        ];
    }

    /**
     * Relación Inversa (1:N): Este documento pertenece a un Envío específico
     */
    public function shipment(): BelongsTo
    {
        return $this->belongsTo(Shipment::class, 'shipment_id', 'shipment_id');
    }
}