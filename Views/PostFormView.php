<!DOCTYPE html>
<html lang="en">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8"/>
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1.0"/>
    <title>Formulaire</title>
</head>
<body>
  <h1>Mon Formulaire pour créer un post et ses metadata</h1>
  <form action="" method="post" id="post-form">
    <span id="post-status-response"></span>
    <div>
      <label for="post-name">Post name</label>
      <input type="text" name="post-name" id="post-name" placeholder="Post name">
    </div>

    <div>
      <label for="post-content">Post content</label>
      <textarea name="post-content" id="post-content" placeholder="Post content"></textarea>
    </div>

    <div>
      <label for="post-mymeta">Metadata : mymeta</label>
      <input type="text" name="post-mymeta" id="post-mymeta" placeholder="Post mymeta">
    </div>

    <button type="submit" id="post-button">Submit</button>
  </form>

</body>
