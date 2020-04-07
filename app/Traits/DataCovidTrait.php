<?php

namespace App\Traits;

use App\Observers\DataCovidObserver as DataCovid;
use App\DataHistory as History;

trait DataCovidTrait
{
	protected function track($model, $func = null, $table = null, $id = null)
	{
		$table = $table ?: $model->getTable();
		$id = $id ?: $model->id;
		$func = $func ?: [$this, 'getHistoryBody'];

		$this->getUpdated($model)
			 ->map(function($value, $field) use ($func) {
			 	return call_user_func_array($func, [$value, $field]);
			 })
			 ->each(function($fields) use ($table, $id) {
			 	History::create([
			 		'reference_table' => $table,
			 		'reference_id' => $id,
			 		'user_id' => auth()->user()->id
			 	] + $fields);
			 });
	}

	protected function getHistoryBody($value, $field)
    {
        return [
            'body' => "Updated {$field} to ${value}",
        ];
    }

    protected function getUpdated($model)
    {
        return collect($model->getDirty())->filter(function ($value, $key) {
            // We don't care if timestamps are dirty, we're not tracking those
            return !in_array($key, ['created_at', 'updated_at']);
        })->mapWithKeys(function ($value, $key) {
            // Take the field names and convert them into human readable strings for the description of the action
            // e.g. first_name -> first name
            return [str_replace('_', ' ', $key) => $value];
        });
    }
}