<?php

return [
  'errors' => [
    'message' => 'Nastal problém s potvrzením požadavku.',
    'unauthorized' => 'Nemáte oprávnění provést tuto akci.',
    'deleting_admin' => 'Nelze smazat jiného admin uživatele.',
    'deleting_self' => 'Nelze smazat sama sebe.'
  ],
  'users' => [
    'edit' => [
      'id' => 'ID',
      'name' => 'Jméno',
      'username' => 'Uživatelské jméno',
      'new_password' => 'Nové heslo',
      'repeat_password' => 'Potvrzení hesla',
      'submit' => 'Aktualizovat Uživatele',
      'status' => 'Uživatel byl úspěsně aktualizován.',
      'image' => 'Změnit Avatar'
    ],
    'delete' => [
      'success' => 'Uživatel byl úspěsně smazán.',
      'error' => 'Nelze smazat tohoto uživatele.'
    ]
  ],
  'articles' => [
    'create' => [
      'name' => 'Titulek',
      'tags' => 'Tagy',
      'published_at' => 'Auto Publikace',
      'content' => 'Obsah',
      'submit' => 'Vytvořit článek',
      'status' => 'Článek byl úspěsně vytvořen.',
      'image' => 'Přidat Náhled'
    ],
    'edit' => [
      'id' => 'ID',
      'name' => 'Titulek',
      'tags' => 'Tagy',
      'published_at' => 'Auto Publikace',
      'content' => 'Obsah',
      'submit' => 'Aktualizovat Článek',
      'status' => 'Article successfully updated.',
      'image' => 'Změnit Náhled'
    ],
    'delete' => [
      'success' => 'Článek byl úspěsně smazán.',
      'error' => 'Nelze smazat tento článek.'
    ],
    'update' => [
      'success' => 'Článek byl úspěsně aktualizován.'
    ]
  ],
  'tags' => [
    'create' => [
      'name' => 'Název',
      'submit' => 'Vytvořit Tag',
      'status' => 'Tag byl úspěsně vytvořen.'
    ],
    'edit' => [
      'id' => 'ID',
      'name' => 'Název',
      'submit' => 'Aktualizovat Tag',
      'status' => 'Tag byl úspěsně aktualizován.'
    ],
    'delete' => [
      'success' => 'Tag byl úspěsně smazán.',
      'error' => 'Nelze smazat tento tag.'
    ]
  ],
  'images' => [
    'delete' => [
      'success' => 'Obrázek byl úspěšně smazán.',
      'error' => 'Nelze smazat tento obrázek.'
    ]
  ]

];
