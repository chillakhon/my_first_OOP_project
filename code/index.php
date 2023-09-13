<?php
function dd($data){
    echo "<pre>";
    var_dump($data);
    echo "</pre>";
} //Функция для вордампа
function pdo($dbname)
{
    return new PDO("mysql:host=localhost;dbname=$dbname",'root','root');
} //Для подключение базу
function get_posts_all ($name_table) {
    $pdo = pdo('app3');
    $sql = "SELECT * FROM $name_table";
    $stm = $pdo->prepare($sql);
    $stm->execute();
    $posts = $stm->fetchAll(PDO::FETCH_ASSOC);
    return $posts;
}

$posts = get_posts_all('posts');
?>

<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>my new project</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-4bw+/aepP/YC94hEpVNVgiZdgIC5+VKNBQNGCHeKRQN+PtmoHDEXuppvnDJzQIu9" crossorigin="anonymous">
</head>
<body>
<nav class="navbar navbar-expand-lg bg-body-tertiary">
    <div class="container-fluid">
        <a class="navbar-brand" href="#">My Blog</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                <li class="nav-item">
                    <a class="nav-link" href="index.php">MainPage</a>
                </li>
            </ul>
        </div>
    </div>
</nav>

    <div class="container">
        <div class="row">
            <div class="col-md-8 offset-md-2">
                <a href="#" class="btn btn-success">Add Post</a>
                <table class="table">
                    <thead>
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">Title</th>
                        <th scope="col">Actions</th>
                    </tr>
                    </thead>
                    <tbody>
                    <?php foreach ($posts as $item): ?>
                    <tr>
                        <th scope="row"><?php echo $item['id']?></th>
                        <td><?php echo $item['title']?></td>
                        <td>
                            <a href="#" class="btn btn-warning">Edit</a>
                            <a href="#" class="btn btn-danger">Delete</a>
                        </td>
                    </tr>
                    <?php endforeach; ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</body>
</html>