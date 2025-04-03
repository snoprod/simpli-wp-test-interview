<!DOCTYPE html>
<html lang="en">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8"/>
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1.0"/>
    <title>Formulaire</title>
</head>
<body>
  <h1>Mon Formulaire pour créer un post et ses metadata</h1>
  <form action="" method="post" id="post_form">
    <span id="post_status_response"></span>
    <div>
      <label for="post_name">Post name</label>
      <input type="text" name="post_name" id="post_name" placeholder="Post name">
    </div>

    <div>
      <label for="post_content">Post content</label>
      <textarea name="post_content" id="post_content" placeholder="Post content"></textarea>
    </div>

    <div>
      <label for="post_mymeta">Metadata : mymeta</label>
      <input type="text" name="post_mymeta" id="post_mymeta" placeholder="Post mymeta">
    </div>

    <button type="submit">Submit</button>
  </form>

</body>
