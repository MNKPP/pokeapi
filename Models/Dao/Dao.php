    <?php

    abstract class Dao
    {

        protected $table;
        public $db;

        public function __construct($table)
        {
            $this->table = $table;
            $this->connect();
        }

        public function connect()
        {
            $this->db = new PDO("mysql:host=localhost;dbname=pokemon", "root", "");
            $this->db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        }

        public function fetch($id)
        {
            $statement = $this->db->prepare("SELECT * FROM {$this->table} WHERE id = ?");
            try {
                $statement->execute([
                    $id
                ]);
                $result = $statement->fetch(PDO::FETCH_ASSOC);
                if ($result) {
                    $this->create($result);
                }
            } catch (PDOException $exception) {
                var_dump($exception);
            }
        }

        public function fetch_all()
        {
            $statement = $this->db->prepare("SELECT * FROM {$this->table}");
            try {
                $statement->execute();
                $results = $statement->fetchAll(PDO::FETCH_ASSOC);

                if ($results) {
                    $list = array();
                    foreach ($results as $result) {
                        array_push($list, $this->create($result));
                    }
                    return $list;
                }
                return false;
            } catch (PDOException $exception) {
                var_dump($exception);
            }
        }
        // Mettre en place le constructeur
        // - Table (Je pense)
        // Utilisation de PDO
        // Implémentation de connect
        // Implémentation de fetch
        // Implémentation de fetchall
        // Implémentation de first
        // Implémentation de where
    }
