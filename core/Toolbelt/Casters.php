<?php


namespace NPCore\Toolbelt;

use Symfony\Component\VarDumper\Caster\Caster;

class Casters
{
    /**
     * @param $collection
     * @return array
     */
    public static function castCollection($collection)
    {
        return [
            Caster::PREFIX_VIRTUAL.'all' => $collection->all(),
        ];
    }

    /**
     * @param $model
     * @return array
     */
    public static function castModel($model)
    {
        $attributes = array_merge(
            $model->getAttributes(), $model->getRelations()
        );
        $visible = array_flip(
            $model->getVisible() ?: array_diff(array_keys($attributes), $model->getHidden())
        );
        $results = [];
        foreach (array_intersect_key($attributes, $visible) as $key => $value) {
            $results[(isset($visible[$key]) ? Caster::PREFIX_VIRTUAL : Caster::PREFIX_PROTECTED).$key] = $value;
        }
        return $results;
    }
}