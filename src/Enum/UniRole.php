<?php

declare(strict_types=1);

namespace App\Enum;

enum UniRole: string
{
    case Admin = 'UniAdmin';
    case ApprovalPts = 'UniApprovalPts';
    case ApprovalDss = 'UniApprovalDss';
    case ApprovalFhs = 'UniApprovalFhs';
    case Enrichment = 'UniEnrichment';
    case ReadOnly = 'UniReadOnly';
}
