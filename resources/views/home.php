
<!DOCTYPE html>
<html lang="en">
<head>
    <?php
    use Illuminate\Support\Facades\Cookie;
    use Illuminate\Support\Facades\Http;
    use Illuminate\Support\Facades\Response;
    ?>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>home</title>
</head>
<body>
    <!-- request data user -->
    <?php
    $token = Cookie::get('token');
    $request = Http::withHeaders([
        'token' => $token
    ])->get('note-taking.my.id/public/user/');
    $user = json_decode($request);
    ?>
    selamat datang <?php echo $user->user->nama ?> <br>

    <!-- request get all note  -->
    <?php
    $request2 = Http::withHeaders([
        'token' => $token
    ])->get('note-taking.my.id/public/note/');
    $note = json_decode($request2);
    foreach($note->user as $note){
    ?>
    <?php
            echo "$note->judul";
            $delete = "deleteNote/".$note->id;
            $update = "updateNote/".$note->id;
    ?>
            <br>
            <form action="<?php return $delete ?>" method="post">
                <input type="submit" value="delete">
            </form>
            <form action="<?php return $update ?>" method="post">
                <input type="submit" value="update">
            </form>
    <?php
    }
    ?>
</body>
</html>
