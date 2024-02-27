<?php

namespace Config;

use CodeIgniter\Config\BaseConfig;
use CodeIgniter\Validation\StrictRules\CreditCardRules;
use CodeIgniter\Validation\StrictRules\FileRules;
use CodeIgniter\Validation\StrictRules\FormatRules;
use CodeIgniter\Validation\StrictRules\Rules;

class Validation extends BaseConfig
{

    public $login = [
        'email' => 'required|valid_email',
        'password' => 'required|min_length[6]',
    ];

    public $rules = [
        'is_unique_with' => 'App\Validators\ValidationRules::isUniqueWith'
    ];

//     class ValidationRules
// {
    public static function isUniqueWith(string $str, string $fields, array $data): bool
    {
        [$table, $field] = explode(',', $fields);
        [$nama_produk, $ukuran] = [$data['nama_produk'], $data['ukuran']];

        $model = new \App\Models\Mproduk();
        $existingProduct = $model
            ->where($field, $ukuran)
            ->where($field != 'nama_produk' ? 'nama_produk' : 'kode !=', $nama_produk)
            ->first();

        return $existingProduct ? false : true;
    }
// }
    // --------------------------------------------------------------------
    // Setup
    // --------------------------------------------------------------------

    /**
     * Stores the classes that contain the
     * rules that are available.
     *
     * @var string[]
     */
    public array $ruleSets = [
        Rules::class,
        FormatRules::class,
        FileRules::class,
        CreditCardRules::class,
    ];

    /**
     * Specifies the views that are used to display the
     * errors.
     *
     * @var array<string, string>
     */
    public array $templates = [
        'list'   => 'CodeIgniter\Validation\Views\list',
        'single' => 'CodeIgniter\Validation\Views\single',
    ];

    // --------------------------------------------------------------------
    // Rules
    // --------------------------------------------------------------------
}
