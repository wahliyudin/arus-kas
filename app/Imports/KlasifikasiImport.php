<?php

namespace App\Imports;

use App\Models\Klasifikasi;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\MessageBag;
use Illuminate\Validation\ValidationException;
use Maatwebsite\Excel\Concerns\ToArray;
use Maatwebsite\Excel\Concerns\WithHeadingRow;

class KlasifikasiImport implements ToArray, WithHeadingRow
{
    /**
     * @param array $data
     */
    public function array(array $data)
    {
        foreach ($data as $i => $val) {
            if (isset($val['nama']) && $val['nama'] == null) {
                unset($data[$i]);
            }
        }
        Klasifikasi::query()->upsert($this->validate($data), 'id');
    }

    private function validate($data)
    {
        $rules = [
            '*.nama' => ['required'],
        ];
        $validator = Validator::make($data, $rules);
        $validator->setException(ValidationException::withMessages($this->transform($validator->getMessageBag())));
        return $validator->valid();
    }

    public function transform(MessageBag $messages)
    {
        $results = [];
        foreach ($messages->getMessages() as $key => $value) {
            $keys = str($key)->explode('.');
            $field = ucwords(str(isset($keys[1]) ? $keys[1] : '')->replace('_', ' ')->value());
            $i = (isset($keys[0]) ? $keys[0] : 0) + 1;
            $results = array_merge($results, [$key => [
                $field . " baris ke-" . $i . str($value[0])->remove($key)->value()
            ]]);
        }
        return $results;
    }
}
