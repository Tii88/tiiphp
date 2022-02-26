<?php 
$name = $_POST["name"];
$email = $_POST["email"];
$phone = $_POST["phone"];
$message = $_POST["message"];
$post = $_POST["post"];

if($post) {
    $write = fopen("publie.txt", "a+");
    fwrite ($write, "<u><b> $name</b></u><br>$email<br>$phone<br>$message<br>");
    fclose ($write);

    $read = fopen ("publie.txt", "r+t");
    echo "All comments:<br>";
    while (!feof ($read)) {
    echo fread ($read, 1024);
}

fclose($read);

}



else {
    $read = fopen ("publie.txt", "r+t");
    echo "All comments:<br>";
    while (!feof ($read)) {
    echo fread ($read, 1024); 
}

fclose($read);

}

?>