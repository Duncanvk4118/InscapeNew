<?php 
session_start();
include '../../database.php';


if ($_SESSION['is-admin'] == 1) {
    header('Location: admin.php');
} else {
    header('Location: student.php');
}
?>