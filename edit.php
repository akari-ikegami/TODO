<!-- 編集機能updateするもの -->

<?php
// 編集機能
// Editボタンをクリックしたら
// 編集画面に移動
// 編集画面には編集対象のデータ表示

include_once('./dbconnect.php');
include_once('./function.php');

$id = $_GET['id'];



// SQL作成,実行
$stmt = $dbh->prepare("SELECT * FROM tasks WHERE id = ?");
$stmt->execute([$id]);

$task = $stmt->fetch();


// 更新機能
// updateボタンをクリックしたら
// 編集対象のデータを更新
// 一覧画面に戻る


?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>編集 | Todoアプリ</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
</head>

<body>
    <div class="container-fulid">
        <div class="row">
            <div class="col-12">
                <nav class="navbar navbar-dark bg-dark">
                    <a href="index.php" class="navbar-brand">Todo</a>
                </nav>
            </div>
        </div>

        <div class="row mt-4 px-4">
            <div class="col-12">
                <form action="update.php" method="post">
                <!-- updatesしたあとの表示 -->
                    <input type="hidden" name="id" value="<?= $id; ?>">
                    <div class="form-group">
                        <label for="title">Title</label>
                        <!-- value入れてる,先に入れたタイトル表示 -->
                        <input type="text" class="form-control" name="title" id="title" value="<?php echo h($task['title']); ?>">
                    </div>
                    <div class="form-group">
                        <label for="contents">Contents</label>
                        <!-- php追加 、先に入れた文章表示-->
                        <textarea class="form-control" name="contents" id="contents" cols="30" rows="10"><?= $task['contents'] ?></textarea>
                    </div>
                    <div class="form-group">
                        <div class="custom-file">
                            <input type="file" class="custom-file-input" id="image">
                            <label class="custom-file-label" for="image">Choose file</label>
                        </div>
                    </div>
                    <input type="hidden" name="id">
                    <div class="d-flex justify-content-end">
                        <button type="submit" class="btn btn-primary">UPDATE</button>
                    </div>
                </form>
            </div>
        </div>
    </div>


</body>

</html>