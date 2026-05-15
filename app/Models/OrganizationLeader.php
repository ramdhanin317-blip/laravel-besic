<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Attributes\Fillable;
use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

#[Fillable(['leader_name', 'organization_id'])]
class OrganizationLeader extends Model
{
    /** @use HasFactory<\Database\Factories\OrganizationLeaderFactory> */
    use HasFactory, HasUuids;

    public function organization(): BelongsTo
    {
        return $this->belongsTo(Organization::class);
    }
}

