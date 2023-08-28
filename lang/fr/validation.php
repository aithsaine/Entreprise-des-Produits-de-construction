<?php

return [

    /*
    |--------------------------------------------------------------------------
    | Messages de Validation de Langage
    |--------------------------------------------------------------------------
    |
    | Les lignes de langage suivantes contiennent les messages d'erreur par défaut utilisés par
    | la classe de validation. Certaines de ces règles ont plusieurs versions telles que
    | les règles de taille. N'hésitez pas à ajuster chacun de ces messages ici.
    |
    */

    'accepted' => "Le champ :attribute doit être accepté.",
    'accepted_if' => "Le champ :attribute doit être accepté quand :other est :value.",
    'active_url' => "Le champ :attribute doit être une URL valide.",
    'after' => "Le champ :attribute doit être une date postérieure à :date.",
    'after_or_equal' => "Le champ :attribute doit être une date postérieure ou égale à :date.",
    'alpha' => "Le champ :attribute ne doit contenir que des lettres.",
    'alpha_dash' => "Le champ :attribute ne doit contenir que des lettres, des chiffres, des tirets et des underscores.",
    'alpha_num' => "Le champ :attribute ne doit contenir que des lettres et des chiffres.",
    'array' => "Le champ :attribute doit être un tableau.",
    'ascii' => "Le champ :attribute ne doit contenir que des caractères alphanumériques et des symboles d'un seul octet.",
    'before' => "Le champ :attribute doit être une date antérieure à :date.",
    'before_or_equal' => "Le champ :attribute doit être une date antérieure ou égale à :date.",
    'between' => [
        'array' => "Le champ :attribute doit avoir entre :min et :max éléments.",
        'file' => "Le champ :attribute doit être entre :min et :max kilooctets.",
        'numeric' => "Le champ :attribute doit être entre :min et :max.",
        'string' => "Le champ :attribute doit être entre :min et :max caractères.",
    ],
    'boolean' => "Le champ :attribute doit être vrai ou faux.",
    'can' => "Le champ :attribute contient une valeur non autorisée.",
    'confirmed' => "La confirmation du champ :attribute ne correspond pas.",
    'current_password' => "Le mot de passe est incorrect.",
    'date' => "Le champ :attribute doit être une date valide.",
    'date_equals' => "Le champ :attribute doit être une date égale à :date.",
    'date_format' => "Le champ :attribute doit correspondre au format :format.",
    'decimal' => "Le champ :attribute doit avoir :decimal décimales.",
    'declined' => "Le champ :attribute doit être refusé.",
    'declined_if' => "Le champ :attribute doit être refusé quand :other est :value.",
    'different' => "Le champ :attribute et :other doivent être différents.",
    'digits' => "Le champ :attribute doit contenir :digits chiffres.",
    'digits_between' => "Le champ :attribute doit être entre :min et :max chiffres.",
    'dimensions' => "Le champ :attribute a des dimensions d'image invalides.",
    'distinct' => "Le champ :attribute a une valeur en double.",
    'doesnt_end_with' => "Le champ :attribute ne doit pas se terminer par l'une des valeurs suivantes : :values.",
    'doesnt_start_with' => "Le champ :attribute ne doit pas commencer par l'une des valeurs suivantes : :values.",
    'email' => "Le champ :attribute doit être une adresse e-mail valide.",
    'ends_with' => "Le champ :attribute doit se terminer par l'une des valeurs suivantes : :values.",
    'enum' => "L'élément sélectionné :attribute est invalide.",
    'exists' => "L'élément sélectionné :attribute est invalide.",
    'file' => "Le champ :attribute doit être un fichier.",
    'filled' => "Le champ :attribute doit avoir une valeur.",
    'gt' => [
        'array' => "Le champ :attribute doit contenir plus de :value éléments.",
        'file' => "Le champ :attribute doit être supérieur à :value kilooctets.",
        'numeric' => "Le champ :attribute doit être supérieur à :value.",
        'string' => "Le champ :attribute doit contenir plus de :value caractères.",
    ],
    // ... Les autres règles ici ...

    /*
    |--------------------------------------------------------------------------
    | Messages de Validation Personnalisés
    |--------------------------------------------------------------------------
    |
    | Ici, vous pouvez spécifier des messages de validation personnalisés pour les attributs en utilisant la
    | convention "attribut.règle" pour nommer les lignes. Cela nous permet de rapidement
    | spécifier un message personnalisé spécifique pour une règle d'attribut donnée.
    |
    */

    'custom' => [
        'nom-de-l-attribut' => [
            'nom-de-la-règle' => 'message-personnalisé',
        ],
    ],

    /*
    |--------------------------------------------------------------------------
    | Attributs de Validation Personnalisés
    |--------------------------------------------------------------------------
    |
    | Les lignes de langage suivantes sont utilisées pour remplacer notre espace réservé d'attribut
    | par quelque chose de plus convivial pour le lecteur, comme "Adresse e-mail" au lieu de "email".
    | Cela nous aide simplement à rendre notre message plus expressif.
    |
    */

    'attributs' => [],

];
