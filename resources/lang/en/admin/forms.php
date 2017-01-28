<?php

return [
  'errors' => [
    'message' => 'There was a problem with submission!',
    'unauthorized' => 'You are not allowed to perform such action.',
    'deleting_admin' => 'You cannot delete another admin user.',
    'deleting_self' => 'You cannot delete yourself.'
  ],
  'users' => [
    'edit' => [
      'id' => 'ID',
      'name' => 'Name',
      'username' => 'User Name',
      'new_password' => 'New Password',
      'repeat_password' => 'Repeat Password',
      'submit' => 'Update User',
      'status' => 'User successfully updated.',
      'image' => 'Change Avatar'
    ],
    'delete' => [
      'success' => 'User successfully deleted.',
      'error' => 'Cannot delete this user.'
    ]
  ],
  'articles' => [
    'create' => [
      'name' => 'Title',
      'tags' => 'Tags',
      'published_at' => 'Auto Publish',
      'content' => 'Content',
      'submit' => 'Create Article',
      'status' => 'Article successfully created.',
      'image' => 'Add Thumbnail'
    ],
    'edit' => [
      'id' => 'ID',
      'name' => 'Title',
      'tags' => 'Tags',
      'published_at' => 'Auto Publish',
      'content' => 'Content',
      'submit' => 'Update Article',
      'status' => 'Article successfully updated.',
      'image' => 'Change Thumbnail'
    ],
    'delete' => [
      'success' => 'Article successfully deleted.',
      'error' => 'Cannot delete this article.'
    ],
    'update' => [
      'success' => 'Article successfully updated.'
    ]
  ],
  'tags' => [
    'create' => [
      'name' => 'Name',
      'colour' => 'Colour',
      'isDisplayed' => 'Display in navigation bar',
      'order' => 'Order in navigation bar',
      'submit' => 'Create Tag',
      'status' => 'Tag successfully created.'
    ],
    'edit' => [
      'id' => 'ID',
      'name' => 'Name',
      'colour' => 'Colour',
      'isDisplayed' => 'Display in navigation bar',
      'order' => 'Order in navigation bar',
      'submit' => 'Update Tag',
      'status' => 'Tag successfully updated.'
    ],
    'delete' => [
      'success' => 'Tag successfully deleted.',
      'error' => 'Cannot delete this tag.'
    ]
  ],
  'images' => [
    'delete' => [
      'success' => 'Image successfully deleted.',
      'error' => 'Cannot delete this image.'
    ]
  ]

];
