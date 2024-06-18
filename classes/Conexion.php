<?php

/**
 * Clase para proveer la conexión de PDO al proyecto.
 */
class Conexion
{
    private const DB_HOST = 'localhost';
    //private const DB_HOST = '127.0.0.1';
    private const DB_USER = 'root';
    private const DB_PASS = '';
    private const DB_NAME = 'vinos_db';

    private const DB_DSN = 'mysql:host=' . self::DB_HOST . ';dbname=' . self::DB_NAME . ';charset=utf8mb4';

    // A las propiedades podemos, de así quererlo, definirles el tipo de dato que deben tener.
    private static ?PDO $db = null;

    public static function conectar()
    {
        try {
            self::$db = new PDO(self::DB_DSN, self::DB_USER, self::DB_PASS);
            self::$db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            //echo "<p>Acabo de crear una conexion para poder traer datos! =D</p>";
        } catch (PDOException $e) {
            die('Error al conectar con MySQL: ' . $e->getMessage());
        }
    }

    /**
     * Función que devuelve una conexión PDO lista para usar
     * @return PDO
     */
    public static function getConexion(): PDO
    {
        if (self::$db === null) {
            self::conectar();
        }
        return self::$db;
    }
}
?>
