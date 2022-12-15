<?php

declare(strict_types=1);

namespace App;

class User
{
    public string $name = 'John Doe';

    public function encryptPassword(string $password): string
    {
        return md5($password);
    }

    public function setUser(string|array|string $data): void
    {
        setcookie('user_name', $data['name'], [
            'expires' => time() + 3600,
            'url' => 'https://example.com',
        ]);
    }
}

$conn = 'db-connect';

$offset = $argv[0]; // beware, no input validation!
$query  = "SELECT id, name FROM products ORDER BY name LIMIT 20 OFFSET $offset;";
$result = pg_query($conn, $query);

$sql = "SELECT * FROM users WHERE id = " . $_GET['id'];
$result = pg_query($conn, $sql);
