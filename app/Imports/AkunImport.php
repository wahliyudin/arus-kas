<?php

namespace App\Imports;

use App\Enums\JenisAkun;
use App\Models\Akun;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\MessageBag;
use Illuminate\Validation\ValidationException;
use Maatwebsite\Excel\Concerns\ToArray;
use Maatwebsite\Excel\Concerns\WithHeadingRow;

class AkunImport implements ToArray, WithHeadingRow
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
        $results = [];
        foreach ($this->validate($data) as $val) {
            $jenisAkun = JenisAkun::get($val['jenis_akun']);
            $val['kode'] = $this->kode($jenisAkun);
            $val['jenis_akun'] = $jenisAkun;
            array_push($results, $val);
        }
        Akun::query()->upsert($results, 'id');
    }

    public function kode($jenisAkun)
    {
        $akun = Akun::query()->where('jenis_akun', $jenisAkun)->latest()->first();
        if ($akun) {
            $currentKode = (int) substr($akun->kode, 2) + 1;
        } else {
            $currentKode = 1;
        }
        return (string)$jenisAkun->kode() . $currentKode;
    }

    private function validate($data)
    {
        $rules = [
            '*.nama' => ['required'],
            '*.jenis_akun' => ['required', 'in:' . implode(',', collect(JenisAkun::cases())->pluck('name')->toArray())],
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
