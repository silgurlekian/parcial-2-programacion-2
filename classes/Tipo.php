<?php

class Tipo
{
    private $id;
    private $nombre;

    /**
     * Devuelve el listado completo de tipos de vino en el sistema
     */
    public static function listaCompleta(): array
    {
        $conexion = Conexion::getConexion();
        $query = "SELECT * FROM tipo";

        $statement = $conexion->prepare($query);
        $statement->setFetchMode(PDO::FETCH_CLASS, self::class);
        $statement->execute();

        $lista = $statement->fetchAll();

        return $lista;
    }

    /**
     * Devuelve los datos de un tipo de vino en particular por su ID
     * @param int $id El ID único del tipo de vino
     * @return Tipo|null Retorna una instancia de Tipo si se encuentra, o null si no existe
     */
    public static function getById(int $id): ?Tipo
    {
        $conexion = Conexion::getConexion();
        $query = "SELECT * FROM tipo WHERE id = :id";

        $statement = $conexion->prepare($query);
        $statement->bindParam(':id', $id, PDO::PARAM_INT);
        $statement->setFetchMode(PDO::FETCH_CLASS, self::class);
        $statement->execute();

        $tipo = $statement->fetch();

        return $tipo ? $tipo : null;
    }

    /**
     * Get the value of id
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * Get the value of nombre
     */
    public function getNombre()
    {
        return $this->nombre;
    }
}
