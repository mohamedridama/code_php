<?php

mysqli_report(MYSQLI_REPORT_ERROR | MYSQLI_REPORT_STRICT);
$mysqli = new mysqli("localhost", "root", "", "smi6");

$result=$mysqli->query("SELECT * FROM etudiant");

echo "<h1>methode fetch_all</h1>";

$rows = $result->fetch_all(MYSQLI_ASSOC);
foreach ($rows as $row) {
    printf("%s (%s)\n", $row["nom"], $row["prenom"]);
    echo "<br>";
}


/* Select queries return a result set */
$result=$mysqli->query("SELECT * FROM etudiant");

echo "<h1>methode fetch_array</h1>";
while($rows = $result->fetch_array(MYSQLI_NUM)){

//print_r($rows);


echo $rows[1], " ", $rows[2];
echo "<br>";
}

echo "<h1> methode fetch_assoc</h1>";
echo "<br>";
$result=$mysqli->query("SELECT * FROM etudiant");
/* fetch associative array */
while ($row = $result->fetch_assoc()) {
    printf("%s (%s)\n", $row["nom"], $row["prenom"]);
    echo "<br>";
}
echo "<h1> methode fetch_object</h1>";
echo "<br>";
/* fetch a single value from the second column */
$result=$mysqli->query("SELECT * FROM etudiant");

while ($obj = $result->fetch_object()) {
    printf("%s (%s)\n", $obj->cin, $obj->nom);
    echo "<br>";
}

echo "<h1> methode fetch_field</h1>";

$result=$mysqli->query("SELECT * FROM etudiant");
 while ($finfo = $result->fetch_field()) {

        printf("Name:     %s\n", $finfo->name);
        printf("Table:    %s\n", $finfo->table);
        printf("max. Len: %d\n", $finfo->max_length);
        printf("Flags:    %d\n", $finfo->flags);
        printf("Type:     %d\n\n", $finfo->type);
        echo "<br>";
    }

echo "<h1> attribue field_count</h1>";

$result=$mysqli->query("SELECT * FROM etudiant");

$field_cnt = $result->field_count;

printf("nombtre de colonnes %d.\n", $field_cnt);


echo "<h1> attribue num_rows</h1>";

/* Get the number of rows in the result set */
$row_cnt = $result->num_rows;

printf("nombre de lignes %d .\n", $row_cnt);
?>