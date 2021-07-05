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

//    'accepted'             => 'The :attribute must be accepted.',
//    'active_url'           => 'The :attribute is not a valid URL.',
//    'after'                => 'The :attribute must be a date after :date.',
//    'alpha'                => 'The :attribute may only contain letters.',
//    'alpha_dash'           => 'The :attribute may only contain letters, numbers, and dashes.',
//    'alpha_num'            => 'The :attribute may only contain letters and numbers.',
//    'array'                => 'The :attribute must be an array.',
//    'before'               => 'The :attribute must be a date before :date.',
//    'between'              => [
//        'numeric' => 'The :attribute must be between :min and :max.',
//        'file'    => 'The :attribute must be between :min and :max kilobytes.',
//        'string'  => 'The :attribute must be between :min and :max characters.',
//        'array'   => 'The :attribute must have between :min and :max items.',
//    ],
//    'boolean'              => 'The :attribute field must be true or false.',
//    'confirmed'            => 'The :attribute confirmation does not match.',
//    'date'                 => 'The :attribute is not a valid date.',
//    'date_format'          => 'The :attribute does not match the format :format.',
//    'different'            => 'The :attribute and :other must be different.',
//    'digits'               => 'The :attribute must be :digits digits.',
//    'digits_between'       => 'The :attribute must be between :min and :max digits.',
//    'distinct'             => 'The :attribute field has a duplicate value.',
//    'email'                => 'The :attribute must be a valid email address.',
//    'exists'               => 'The selected :attribute is invalid.',
//    'filled'               => 'The :attribute field is required.',
//    'image'                => 'The :attribute must be an image.',
//    'in'                   => 'The selected :attribute is invalid.',
//    'in_array'             => 'The :attribute field does not exist in :other.',
//    'integer'              => 'The :attribute must be an integer.',
//    'ip'                   => 'The :attribute must be a valid IP address.',
//    'json'                 => 'The :attribute must be a valid JSON string.',
//    'max'                  => [
//        'numeric' => 'The :attribute may not be greater than :max.',
//        'file'    => 'The :attribute may not be greater than :max kilobytes.',
//        'string'  => 'The :attribute may not be greater than :max characters.',
//        'array'   => 'The :attribute may not have more than :max items.',
//    ],
//    'mimes'                => 'The :attribute must be a file of type: :values.',
//    'min'                  => [
//        'numeric' => 'The :attribute must be at least :min.',
//        'file'    => 'The :attribute must be at least :min kilobytes.',
//        'string'  => 'The :attribute must be at least :min characters.',
//        'array'   => 'The :attribute must have at least :min items.',
//    ],
//    'not_in'               => 'The selected :attribute is invalid.',
//    'numeric'              => 'The :attribute must be a number.',
//    'present'              => 'The :attribute field must be present.',
//    'regex'                => 'The :attribute format is invalid.',
//    'required'             => 'The :attribute field is required.',
//    'required_if'          => 'The :attribute field is required when :other is :value.',
//    'required_unless'      => 'The :attribute field is required unless :other is in :values.',
//    'required_with'        => 'The :attribute field is required when :values is present.',
//    'required_with_all'    => 'The :attribute field is required when :values is present.',
//    'required_without'     => 'The :attribute field is required when :values is not present.',
//    'required_without_all' => 'The :attribute field is required when none of :values are present.',
//    'same'                 => 'The :attribute and :other must match.',
//    'size'                 => [
//        'numeric' => 'The :attribute must be :size.',
//        'file'    => 'The :attribute must be :size kilobytes.',
//        'string'  => 'The :attribute must be :size characters.',
//        'array'   => 'The :attribute must contain :size items.',
//    ],
//    'string'               => 'The :attribute must be a string.',
//    'timezone'             => 'The :attribute must be a valid zone.',
//    'unique'               => 'The :attribute has already been taken.',
//    'url'                  => 'The :attribute format is invalid.',
//
//    /*
//    |--------------------------------------------------------------------------
//    | Custom Validation Language Lines
//    |--------------------------------------------------------------------------
//    |
//    | Here you may specify custom validation messages for attributes using the
//    | convention "attribute.rule" to name the lines. This makes it quick to
//    | specify a specific custom language line for a given attribute rule.
//    |
//    */
//
//    'custom' => [
//        'attribute-name' => [
//            'rule-name' => 'custom-message',
//        ],
//    ],
//
//    /*
//    |--------------------------------------------------------------------------
//    | Custom Validation Attributes
//    |--------------------------------------------------------------------------
//    |
//    | The following language lines are used to swap attribute place-holders
//    | with something more reader friendly such as E-Mail Address instead
//    | of "email". This simply helps us make messages a little cleaner.
//    |
//    */
//
//    'attributes' => [],


    'accepted' => 'Атрибут: должен быть принят.',
    'active_url' => 'Атрибут: не является допустимым URL.',
    'after' => 'Атрибут: должен быть датой после: date.',
    'alpha' => 'Атрибут: может содержать только буквы.',
    'alpha_dash' => 'Атрибут: может содержать только буквы, цифры и дефисы.',
    'alpha_num' => 'Атрибут: может содержать только буквы и цифры.',
    'array' => 'Атрибут: должен быть массивом.',
    'before' => 'Атрибут: должен быть датой до: date.',
    'between' => [
        'numeric' => 'Атрибут: должен быть между: min и: max.',
        'file' => 'Атрибут: должен находиться в диапазоне от: min до: max килобайт.',
        'string' => 'Атрибут: должен содержать символы: min и: max.',
        'array' => 'Атрибут: должен содержать от: min до: max элементов.',
    ],
    'boolean' => 'Поле: attribute должно быть истинным или ложным.',
    'confirmed' => 'Подтверждение: attribute не соответствует.',
    'date' => 'Атрибут: не является допустимой датой.',
    'date_format' => 'Атрибут: не соответствует формату: format.',
    'different' => 'Атрибут: и: другие должны быть разными.',
    'digits' => 'Атрибут: должен быть: digits digits.',
    'digits_between' => 'Атрибут: должен быть между: min и: max цифрами.',
    'distinct'             => 'The :attribute field has a duplicate value.',
    'email' => 'Атрибут: должен быть действующим адресом электронной почты.',
    'exists' => 'Атрибут selected: недействителен.',
    'filled' => 'Поле: attribute обязательно для заполнения.',
    'image' => 'Атрибут: должен быть изображением.',
    'in' => 'Атрибут selected: недействителен.',
    'in_array' => 'Поле: attribute не существует в: other.',
    'integer' => 'Атрибут: должен быть целым числом.',
    'ip' => 'Атрибут: должен быть действительным IP-адресом.',
    'json' => 'Атрибут: должен быть допустимой строкой JSON.',
    'max' => [
        'numeric' => 'Атрибут: не может быть больше, чем: max.',
        'file' => 'Атрибут: не может быть больше: max килобайт.',
        'string' => 'Атрибут: не может быть больше, чем: макс. символов.',
        'array' => 'Атрибут: не может содержать более: max элементов.',
    ],

    'mimes' => 'Атрибут: должен быть файлом типа:: values.',
    'min' => [
        'numeric' => 'Атрибут: должен быть не меньше: мин.',
        'file' => 'Атрибут: должен быть не меньше: min килобайт.',
        'string' => 'Атрибут: должен содержать не менее: min символов.',
        'array' => 'Атрибут: должен содержать как минимум: min элементов.',
    ],
    'not_in' => 'Атрибут selected: недействителен.',
    'numeric' => 'Атрибут: должен быть числом.',
    'present' => 'Поле: attribute должно присутствовать.',
    'regex' => 'Недействительный формат: attribute.',
    'required' => 'Поле: attribute обязательно для заполнения.',
    'required_if' => 'Поле: attribute необходимо, когда: other is: value.',
    'required_unless' => 'Поле: attribute является обязательным, если: other не находится в: values.',
    'required_with' => 'Поле: attribute обязательно, если присутствует: values.',
    'required_with_all' => 'Поле: attribute обязательно, если присутствует: values.',
    'required_without' => 'Поле: attribute является обязательным, если: values ​​отсутствует.',
    'required_without_all' => 'Поле: attribute является обязательным, если ни одно из: значений не присутствует.',
    'same' => 'Атрибут: и: другие должны совпадать.',
    'size' => [
        'numeric' => 'Атрибут: должен быть: size.',
        'file' => 'Атрибут: должен быть: размер в килобайтах.',
        'string' => 'Атрибут: должен содержать символы: size.',
        'array' => 'Атрибут: должен содержать элементы: size.',
    ],
    'string' => 'Атрибут: должен быть строкой.',
    'timezone' => 'Атрибут: должен быть допустимой зоной.',
    'unique' => 'Атрибут: уже занят.',
    'url' => 'Недопустимый формат атрибута:.',


    'custom' => [
        'attribute-name' => [
            'rule-name' => 'custom-message',
        ],
    ],

    'attributes' => [],

];
