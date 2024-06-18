<?php

class Vino
{
    private int $id;
    private string $nombre;
    private string $tipo;
    private string $descripcion;
    private float $precio;
    private string $pais_origen;
    private string $region;
    private string $anio_cosecha;
    private string $bodega;
    private string $imagen;

    private static array $createValues = ['id', 'nombre', 'tipo', 'descripcion', 'precio', 'pais_origen', 'region', 'anio_cosecha', 'bodega', 'imagen'];

    public function __construct($vinoData = [])
    {
        foreach (self::$createValues as $value) {
            $this->{$value} = $vinoData[$value] ?? null;
        }
    }

    private static function createVino($vinoData): Vino
    {
        return new self($vinoData);
    }

    public static function catalogoCompleto(): array
    {
        try {
            $conexion = Conexion::getConexion();
            $query = "SELECT * FROM vinos";

            $PDOStatement = $conexion->prepare($query);
            $PDOStatement->setFetchMode(PDO::FETCH_ASSOC);
            $PDOStatement->execute();

            $catalogo = [];
            while ($result = $PDOStatement->fetch()) {
                $catalogo[] = self::createVino($result);
            }

            return $catalogo;
        } catch (PDOException $e) {
            echo "Error al obtener el catálogo de vinos: " . $e->getMessage();
            return [];
        }
    }

    public static function vinoPorId(int $idVino): ?Vino
    {
        try {
            $conexion = Conexion::getConexion();
            $query = "SELECT * FROM vinos WHERE id = ?";

            $PDOStatement = $conexion->prepare($query);
            $PDOStatement->setFetchMode(PDO::FETCH_ASSOC);
            $PDOStatement->execute([$idVino]);

            $result = $PDOStatement->fetch();

            return $result ? self::createVino($result) : null;
        } catch (PDOException $e) {
            echo "Error al obtener el vino por ID: " . $e->getMessage();
            return null;
        }
    }

    public static function catalogoPorPais(string $pais): array
    {
        try {
            $conexion = Conexion::getConexion();
            $query = "SELECT * FROM vinos WHERE pais_origen = ?";

            $PDOStatement = $conexion->prepare($query);
            $PDOStatement->setFetchMode(PDO::FETCH_ASSOC);
            $PDOStatement->execute([$pais]);

            $catalogo = [];
            while ($result = $PDOStatement->fetch()) {
                $catalogo[] = self::createVino($result);
            }

            return $catalogo;
        } catch (PDOException $e) {
            echo "Error al obtener el catálogo por país: " . $e->getMessage();
            return [];
        }
    }

    public static function catalogoPorBodega(string $bodega): array
    {
        try {
            $conexion = Conexion::getConexion();
            $query = "SELECT * FROM vinos WHERE bodega = ?";

            $PDOStatement = $conexion->prepare($query);
            $PDOStatement->setFetchMode(PDO::FETCH_ASSOC);
            $PDOStatement->execute([$bodega]);

            $catalogo = [];
            while ($result = $PDOStatement->fetch()) {
                $catalogo[] = self::createVino($result);
            }

            return $catalogo;
        } catch (PDOException $e) {
            echo "Error al obtener el catálogo por bodega: " . $e->getMessage();
            return [];
        }
    }

    public static function vinosPorTipo($tipo): array
    {
        try {
            $db = Conexion::getConexion();
            $query = "SELECT * FROM vinos WHERE tipo = :tipo";
            $stmt = $db->prepare($query);
            $stmt->bindParam(':tipo', $tipo, PDO::PARAM_STR);
            $stmt->execute();

            $resultados = $stmt->fetchAll(PDO::FETCH_ASSOC);

            $vinos = [];
            if ($resultados) {
                foreach ($resultados as $fila) {
                    $vinos[] = self::createVino($fila);
                }
            }

            return $vinos;
        } catch (PDOException $e) {
            echo "Error al obtener vinos por tipo: " . $e->getMessage();
            return [];
        }
    }

    public static function vinosPorRegion(string $region): array
    {
        try {
            $conexion = Conexion::getConexion();
            $query = "SELECT * FROM vinos WHERE region = ?";

            $PDOStatement = $conexion->prepare($query);
            $PDOStatement->setFetchMode(PDO::FETCH_ASSOC);
            $PDOStatement->execute([$region]);

            $vinos = [];
            while ($result = $PDOStatement->fetch()) {
                $vinos[] = self::createVino($result);
            }

            return $vinos;
        } catch (PDOException $e) {
            echo "Error al obtener vinos por región: " . $e->getMessage();
            return [];
        }
    }

    public static function vinosPorVariedad(string $variedad): array
    {
        try {
            $conexion = Conexion::getConexion();
            $query = "SELECT * FROM vinos WHERE variedad = ?";

            $PDOStatement = $conexion->prepare($query);
            $PDOStatement->setFetchMode(PDO::FETCH_ASSOC);
            $PDOStatement->execute([$variedad]);

            $vinos = [];
            while ($result = $PDOStatement->fetch()) {
                $vinos[] = self::createVino($result);
            }

            return $vinos;
        } catch (PDOException $e) {
            echo "Error al obtener vinos por variedad: " . $e->getMessage();
            return [];
        }
    }

    public static function vinosPorTipoYRegion(string $tipo, string $region): array
    {
        try {
            $conexion = Conexion::getConexion();
            $query = "SELECT * FROM vinos WHERE tipo = ? AND region = ?";

            $PDOStatement = $conexion->prepare($query);
            $PDOStatement->setFetchMode(PDO::FETCH_ASSOC);
            $PDOStatement->execute([$tipo, $region]);

            $vinos = [];
            while ($result = $PDOStatement->fetch()) {
                $vinos[] = self::createVino($result);
            }

            return $vinos;
        } catch (PDOException $e) {
            echo "Error al obtener vinos por tipo y región: " . $e->getMessage();
            return [];
        }
    }

    public static function vinosPorTipoYVariedad(string $tipo, string $variedad): array
    {
        try {
            $conexion = Conexion::getConexion();
            $query = "SELECT * FROM vinos WHERE tipo = ? AND variedad = ?";

            $PDOStatement = $conexion->prepare($query);
            $PDOStatement->setFetchMode(PDO::FETCH_ASSOC);
            $PDOStatement->execute([$tipo, $variedad]);

            $vinos = [];
            while ($result = $PDOStatement->fetch()) {
                $vinos[] = self::createVino($result);
            }

            return $vinos;
        } catch (PDOException $e) {
            echo "Error al obtener vinos por tipo y variedad: " . $e->getMessage();
            return [];
        }
    }

    public static function insertarVino($nombre, $tipo, $descripcion, $precio, $pais_origen, $region, $anio_cosecha, $bodega, $imagen): int
    {
        try {
            $conexion = Conexion::getConexion();
            $query = "INSERT INTO vinos VALUES (NULL, :nombre, :tipo, :descripcion, :precio, :pais_origen, :region, :anio_cosecha, :bodega, :imagen)";

            $PDOStatement = $conexion->prepare($query);
            $PDOStatement->execute([
                'nombre' => $nombre,
                'tipo' => $tipo,
                'descripcion' => $descripcion,
                'precio' => $precio,
                'pais_origen' => $pais_origen,
                'region' => $region,
                'anio_cosecha' => $anio_cosecha,
                'bodega' => $bodega,
                'imagen' => $imagen,
            ]);

            return $conexion->lastInsertId();
        } catch (PDOException $e) {
            echo "Error al insertar el vino: " . $e->getMessage();
            return 0;
        }
    }

    public static function actualizarVino($id, $nombre, $tipo, $descripcion, $precio, $pais_origen, $region, $anio_cosecha, $bodega, $imagen)
    {
        try {
            $conexion = Conexion::getConexion();
            $query = "UPDATE vinos SET nombre = :nombre, tipo = :tipo, descripcion = :descripcion, precio = :precio, pais_origen = :pais_origen, region = :region, anio_cosecha = :anio_cosecha, bodega = :bodega, imagen = :imagen WHERE id = :id";

            $PDOStatement = $conexion->prepare($query);
            $PDOStatement->execute([
                'id' => $id,
                'nombre' => $nombre,
                'tipo' => $tipo,
                'descripcion' => $descripcion,
                'precio' => $precio,
                'pais_origen' => $pais_origen,
                'region' => $region,
                'anio_cosecha' => $anio_cosecha,
                'bodega' => $bodega,
                'imagen' => $imagen,
            ]);
        } catch (PDOException $e) {
            echo "Error al actualizar el vino: " . $e->getMessage();
        }
    }

    public static function eliminarVino($id)
    {
        try {
            $conexion = Conexion::getConexion();
            $query = "DELETE FROM vinos WHERE id = ?";

            $PDOStatement = $conexion->prepare($query);
            $PDOStatement->execute([$id]);
        } catch (PDOException $e) {
            echo "Error al eliminar el vino: " . $e->getMessage();
        }
    }

    public function getId()
    {
        return $this->id;
    }

    public function getNombre()
    {
        return $this->nombre;
    }

    public function getTipo()
    {
        return $this->tipo;
    }

    public function getDescripcion()
    {
        return $this->descripcion;
    }

    public function getPrecio()
    {
        return $this->precio;
    }

    public function getPaisOrigen()
    {
        return $this->pais_origen;
    }

    public function getRegion()
    {
        return $this->region;
    }

    public function getAnioCosecha()
    {
        return $this->anio_cosecha;
    }

    public function getBodega()
    {
        return $this->bodega;
    }

    public function getImagen()
    {
        return $this->imagen;
    }
}
