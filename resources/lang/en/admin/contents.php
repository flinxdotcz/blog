<?php

return [

  'articles' => [
    'show' => [
      'id' => 'ID',
      'author' => 'Author',
      'name' => 'Title',
      'tags' => 'Tags',
      'created_at' => 'Created At',
      'updated_at' => 'Updated At',
      'publish' => 'Publish',
      'edit' => 'Edit',
      'delete' => 'Delete'
    ],
    'table' => [
      'name' => 'Title',
      'excerpt' => 'Content Excerpt',
      'created_at' => 'Created At',
      'updated_at' => 'Updated At'
    ]
  ],
  'tags' => [
    'show' => [
      'id' => 'ID',
      'name' => 'Name',
      'created_at' => 'Created At',
      'updated_at' => 'Updated At',
      'edit' => 'Edit',
      'delete' => 'Delete',
      'articles' => 'Articles'
    ],
    'table' => [
      'name' => 'Name',
      'created_at' => 'Created At',
      'updated_at' => 'Updated At'
    ]
  ],
  'users' => [
    'show' => [
      'id' => 'ID',
      'name' => 'Name',
      'username' => 'User Name',
      'email' => 'E-mail',
      'role' => 'Role',
      'created_at' => 'Created At',
      'updated_at' => 'Updated At',
      'edit' => 'Edit',
      'delete' => 'Delete',
      'articles' => 'Articles'
    ],
    'table' => [
      'name' => 'Name',
      'email' => 'E-mail',
      'username' => 'User Name',
      'role' => 'Role',
      'created_at' => 'Created At',
      'updated_at' => 'Updated At'
    ]
  ],
  'images' => [
    'index' => [
      'thumbnails' => 'Thumbnails',
      'avatars' => 'Avatar',
      'delete' => 'Delete'
    ]
  ]

];
