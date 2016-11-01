<?php

return [

  'articles' => [
    'show' => [
      'id' => 'ID',
      'author' => 'Autor',
      'name' => 'Titulek',
      'tags' => 'Tagy',
      'created_at' => 'Vytvořeno',
      'updated_at' => 'Aktualizováno',
      'published_at' => 'Auto publikace',
      'publish' => 'Publikovat',
      'unpublish' => 'Skrýt',
      'edit' => 'Upravit',
      'delete' => 'Smazat',
      'discard' => 'Zahodit',
      'unpublished' => 'NEPUBLIKOVANÝ',
      'draft' => 'KONCEPT'
    ],
    'table' => [
      'name' => 'Titulek',
      'excerpt' => 'Úryvek obsahu',
      'created_at' => 'Vytvořeno',
      'updated_at' => 'Aktualizováno',
      'published_at' => 'Publikováno'
    ]
  ],
  'tags' => [
    'show' => [
      'id' => 'ID',
      'name' => 'Název',
      'created_at' => 'Vytvořeno',
      'updated_at' => 'Aktualizováno',
      'edit' => 'Upravit',
      'delete' => 'Smazat',
      'articles' => 'Články'
    ],
    'table' => [
      'name' => 'Název',
      'created_at' => 'Vytvořeno',
      'updated_at' => 'Aktualizováno'
    ]
  ],
  'users' => [
    'show' => [
      'id' => 'ID',
      'name' => 'Jméno',
      'username' => 'Uživatelské jméno',
      'email' => 'E-mail',
      'role' => 'Role',
      'created_at' => 'Vytvořeno',
      'updated_at' => 'Aktualizováno',
      'edit' => 'Upravit',
      'delete' => 'Smazat',
      'articles' => 'Články'
    ],
    'table' => [
      'name' => 'Jméno',
      'email' => 'E-mail',
      'username' => 'Uživatelské jméno',
      'role' => 'Role',
      'created_at' => 'Vytvořeno',
      'updated_at' => 'Aktualizováno'
    ]
  ],
  'images' => [
    'index' => [
      'thumbnails' => 'Náhledy',
      'avatars' => 'Avatar',
      'delete' => 'Smazat'
    ]
  ]

];
