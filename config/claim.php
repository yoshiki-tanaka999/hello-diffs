<?php

return [

    'CLAIM_BASE_KEY' => 'shoot_claim',
    'USER_ACTION' => [
        'LIKE' => 'like',
        'REPORT' => 'report',
        'IMPRESSION' => 'impression'
    ],
    'BULK_UPDATE_QUERY' => [
        'USER_ACTION_COUNT' => 'UPDATE claims SET %s_count = %s WHERE id IN (%s)',
    ]
];