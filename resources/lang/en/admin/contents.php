<?php

return [

  'articles' => [
    'show' => [
      'id' => 'ID',
      'author' => 'Author',
      'name' => 'Title',
      'tags' => 'Tags',
      'created_at' => 'Created',
      'updated_at' => 'Updated',
      'published_at' => 'Auto Publish',
      'publish' => 'Publish Now',
      'unpublish' => 'Unpublish',
      'edit' => 'Edit',
      'delete' => 'Delete',
      'discard' => 'Discard',
      'unpublished' => 'UNPUBLISHED',
      'draft' => 'DRAFT'
    ],
    'table' => [
      'id' => 'ID',
      'name' => 'Title',
      'author' => 'Author',
      'excerpt' => 'Content Excerpt',
      'created_at' => 'Created',
      'updated_at' => 'Updated',
      'published_at' => 'Published'
    ]
  ],
  'tags' => [
    'show' => [
      'id' => 'ID',
      'name' => 'Name',
      'created_at' => 'Created',
      'updated_at' => 'Updated',
      'edit' => 'Edit',
      'delete' => 'Delete',
      'articles' => 'Articles'
    ],
    'table' => [
      'id' => 'ID',
      'name' => 'Name',
      'created_at' => 'Created',
      'updated_at' => 'Updated'
    ]
  ],
  'users' => [
    'show' => [
      'id' => 'ID',
      'name' => 'Name',
      'username' => 'User Name',
      'email' => 'E-mail',
      'role' => 'Role',
      'created_at' => 'Created',
      'updated_at' => 'Updated',
      'edit' => 'Edit',
      'delete' => 'Delete',
      'articles' => 'Articles'
    ],
    'table' => [
      'id' => 'ID',
      'name' => 'Name',
      'email' => 'E-mail',
      'username' => 'User Name',
      'role' => 'Role',
      'created_at' => 'Created',
      'updated_at' => 'Updated'
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
