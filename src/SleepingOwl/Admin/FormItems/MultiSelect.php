<?php namespace SleepingOwl\Admin\FormItems;

use Illuminate\Database\Eloquent\Collection;

class MultiSelect extends Select
{

	protected $view = 'multiselect';

	public function value()
	{
		$value = parent::value();
		if ($value instanceof Collection  && $value->count() > 0)
		{
			$value = $value->pluck($value->first()->getKeyName())->all();
		}
		if ($value instanceof Collection)
		{
			$value = $value->toArray();
		}
		return $value;
	}

}
