<?php

return [

    /*
    |--------------------------------------------------------------------------
    | Validation Language Lines
    |--------------------------------------------------------------------------
    |
    | The following language lines contain the default error messages used by
    | the validator class. Some of these rules have multiple versions such
    | as the size rules. Feel free to tweak each of these messages here.
    |
    */

    'accepted' => 'La :attribute deve essere accettato.',
    'active_url' => "L':attribute non è un URL valido.",
    'after' => 'Il :attribute deve essere una data successiva a :date.',
    'after_or_equal' => 'Il :attribute deve essere una data successiva o uguale a :date.',
    'alpha' => 'Il :attribute può contenere solo lettere.',
    'alpha_dash' => 'Il :attribute può contenere solo lettere, numeri, trattini e trattini bassi.',
    'alpha_num' => 'Il :attribute può contenere solo lettere e numeri.',
    'array' => 'Il :attribute deve essere un array.',
    'before' => 'Il :attribute deve essere una data precedente a :date.',
    'before_or_equal' => 'Il :attribute deve essere una data precedente o uguale a :date.',
    'between' => [
        'numeric' => 'Il :attribute deve essere compreso tra :min e :max.',
        'file' => 'Il :attribute deve essere compreso tra :min e :max kilobytes.',
        'string' => 'Il :attribute deve essere compreso tra :min e :max caratteri.',
        'array' => 'Il :attribute deve have compreso tra :min e :max elementi.',
    ],
    'boolean' => 'Il campo :attribute  deve essere true or false.',
    'confirmed' => 'Il :attribute confirmation does not match.',
    'date' => 'Il :attribute è not a valid date.',
    'date_equals' => 'Il :attribute deve essere a date equal to :date.',
    'date_format' => 'Il :attribute does not match the format :format.',
    'different' => 'Il :attribute e :other deve essere different.',
    'digits' => 'Il :attribute deve essere :digits digits.',
    'digits_between' => 'Il :attribute deve essere between :min e :max digits.',
    'dimensions' => 'Il :attribute has invalid image dimensions.',
    'distinct' => 'Il campo :attribute  has a duplicate value.',
    'email' => 'Il :attribute deve essere a valid email address.',
    'ends_with' => 'Il :attribute deve finire con uno dei seguenti valori: :values.',
    'exists' => 'Il selected :attribute è invalid.',
    'file' => 'Il :attribute deve essere a file.',
    'filled' => 'Il campo :attribute  deve have a value.',
    'gt' => [
        'numeric' => 'Il :attribute deve essere maggiore di :value.',
        'file' => 'Il :attribute deve essere maggiore di :value kilobytes.',
        'string' => 'Il :attribute deve essere maggiore di :value caratteri.',
        'array' => 'Il :attribute deve have more di :value elementi.',
    ],
    'gte' => [
        'numeric' => 'Il :attribute deve essere maggiore di or equal :value.',
        'file' => 'Il :attribute deve essere maggiore di or equal :value kilobytes.',
        'string' => 'Il :attribute deve essere maggiore di or equal :value caratteri.',
        'array' => 'Il :attribute deve have :value elementi or more.',
    ],
    'image' => 'Il :attribute deve essere an image.',
    'in' => 'Il selected :attribute è invalid.',
    'in_array' => 'Il campo :attribute  does not exist in :other.',
    'integer' => 'Il :attribute deve essere an integer.',
    'ip' => 'Il :attribute deve essere a valid IP address.',
    'ipv4' => 'Il :attribute deve essere a valid IPv4 address.',
    'ipv6' => 'Il :attribute deve essere a valid IPv6 address.',
    'json' => 'Il :attribute deve essere a valid JSON string.',
    'lt' => [
        'numeric' => 'Il :attribute deve essere minore di :value.',
        'file' => 'Il :attribute deve essere minore di :value kilobytes.',
        'string' => 'Il :attribute deve essere minore di :value caratteri.',
        'array' => 'Il :attribute deve have minore di :value elementi.',
    ],
    'lte' => [
        'numeric' => 'Il :attribute deve essere minore di or equal :value.',
        'file' => 'Il :attribute deve essere minore di or equal :value kilobytes.',
        'string' => 'Il :attribute deve essere minore di or equal :value caratteri.',
        'array' => 'Il :attribute deve not have more di :value elementi.',
    ],
    'max' => [
        'numeric' => 'Il :attribute may not be maggiore di :max.',
        'file' => 'Il :attribute may not be maggiore di :max kilobytes.',
        'string' => 'Il :attribute may not be maggiore di :max caratteri.',
        'array' => 'Il :attribute may not have more di :max elementi.',
    ],
    'mimes' => 'Il :attribute deve essere a file of type: :values.',
    'mimetypes' => 'Il :attribute deve essere a file of type: :values.',
    'min' => [
        'numeric' => 'Il :attribute deve essere at least :min.',
        'file' => 'Il :attribute deve essere at least :min kilobytes.',
        'string' => 'Il :attribute deve essere at least :min caratteri.',
        'array' => 'Il :attribute deve have at least :min elementi.',
    ],
    'not_in' => 'Il selected :attribute è invalid.',
    'not_regex' => 'Il :attribute format è invalid.',
    'numeric' => 'Il :attribute deve essere a number.',
    'password' => 'Il password è incorrect.',
    'present' => 'Il campo :attribute  deve essere present.',
    'regex' => 'Il :attribute format è invalid.',
    'required' => 'Il campo :attribute  è required.',
    'required_if' => 'Il campo :attribute  è required when :other è :value.',
    'required_unminore' => 'Il campo :attribute  è required unminore :other è in :values.',
    'required_with' => 'Il campo :attribute  è required when :values è present.',
    'required_with_all' => 'Il campo :attribute  è required when :values are present.',
    'required_without' => 'Il campo :attribute  è required when :values è not present.',
    'required_without_all' => 'Il campo :attribute  è required when none of :values are present.',
    'same' => 'Il :attribute e :other deve match.',
    'size' => [
        'numeric' => 'Il :attribute deve essere :size.',
        'file' => 'Il :attribute deve essere :size kilobytes.',
        'string' => 'Il :attribute deve essere :size caratteri.',
        'array' => 'Il :attribute deve contain :size elementi.',
    ],
    'starts_with' => 'Il :attribute deve start con uno dei seguenti valori: :values.',
    'string' => 'Il :attribute deve essere a string.',
    'timezone' => 'Il :attribute deve essere a valid zone.',
    'unique' => 'Il :attribute has already been taken.',
    'uploaded' => 'Il :attribute failed to upload.',
    'url' => 'Il :attribute format è invalid.',
    'uuid' => 'Il :attribute deve essere a valid UUID.',

    /*
    |--------------------------------------------------------------------------
    | Custom Validation Language Lines
    |--------------------------------------------------------------------------
    |
    | Here you may specify custom validation messages for attributes using the
    | convention "attribute.rule" to name the lines. This makes it quick to
    | specify a specific custom language line for a given attribute rule.
    |
    */

    'custom' => [
        'attribute-name' => [
            'rule-name' => 'custom-message',
        ],
    ],

    /*
    |--------------------------------------------------------------------------
    | Custom Validation Attributes
    |--------------------------------------------------------------------------
    |
    | The following language lines are used to swap our attribute placeholder
    | with something more reader friendly such as "E-Mail Address" instead
    | of "email". This simply helps us make our message more expressive.
    |
    */

    'attributes' => [],

];
