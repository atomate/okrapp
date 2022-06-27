<?php

namespace App\Repositories;

use App\Models\KeyResult;
use App\Models\Objective;
use LaravelIdea\Helper\App\Models\_IH_Objective_C;

/**
 *
 */
class KeyResultRepository
{
    /**
     * @param $data
     * @return Objective|Objective[]|_IH_Objective_C|null
     */
    function store($data)
    {
        KeyResult::create($data);

        return Objective::find($data['objective_id']);
    }

    /**
     * @param $keyResult
     * @param $data
     * @return Objective|Objective[]|_IH_Objective_C|null
     */
    function update($keyResult, $data)
    {
        $keyResult->update($data);
        $keyResult = KeyResult::find($data['keyResult_id']);

        return Objective::find($keyResult->objective_id);
    }

    function delete($keyResult) {
        $keyResult->delete();
        return Objective::find($keyResult->objective->id);
    }
}
