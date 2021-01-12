
<?php
/**
 * Plugin Name: Retravailler
 */

function test_bdd()
{
    try {
        $bdd = new PDO('mysql:host=localhost;dbname=wordpress55x210105144126;charset=utf8', 'root', '', array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION));
    } catch (Exception $e) {
        die('Erreur : ' . $e->getMessage());
    }

    $response = $bdd->query('SELECT * FROM test');
    while ($donnes = $response->fetch()) {
        echo $donnes['id'] . ' | ' . $donnes['nom'] . '<br>';
    }
}

add_action('admin_notices', 'test_bdd');


function custom_header() {
    $arg = 'aaa';
    add_theme_support('custom_header', $arg);
}

add_action('after_setup_theme', 'custom_header');