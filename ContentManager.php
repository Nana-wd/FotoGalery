<?php

//namespace FotoGalery;

class ContentManager
{
    private $db;

    /**
     * Initializes the class with a database connection.
     */
    public function __construct(object $db)
    {
        $this->db = $db;
    }
    /**
     * Retrieves a list of articles from the database.
     *
     * @return array An array of associative arrays containing article data.
     */
    public function getStatti(): array
    {
        $sql = "SELECT id, title, date, img_src, discription,id_galery FROM statti";
        $smtp = $this->db->query($sql);
        $arr = $smtp->fetchAll(PDO::FETCH_ASSOC);
        return $arr;
    }
    /**
     * Retrieves a specific article by its ID.
     * @param int $id The ID of the article to retrieve.
     * @return array An associative array containing the article data.
     * @throws Exception If no article is found, it exits with 'Статтей нет'.
     */
    public function getText(int $id): array
    {
        $stmt = $this->db->prepare("SELECT id, title, date, img_src, text FROM statti WHERE id = :id");

        $stmt->execute([':id' => $id]);
        $arr = $stmt->fetch(PDO::FETCH_ASSOC);

        return $arr ?: exit('Статтей нет');
    }


    /**
     * Retrieves a list of categories from the database.
     *
     * This method prepares and executes a SQL query to fetch all categories
     * from the category table. It returns an array of categories. If no categories are found,
     * it exits with a message.
     */
    public function getCat(): array
    {
        $stmt = $this->db->prepare("SELECT id_category, name_category FROM category");
        $stmt->execute();
        $rows = $stmt->fetchAll(PDO::FETCH_ASSOC);

        return $rows ?: exit('Категорий нет');
    }
    /**
     * Renders a template file with the provided variables.
     *
     * This method checks if the specified template file exists. If it does,
     * it extracts the variables from the provided array and includes the
     * template file. The output of the template is captured and returned as
     * a string. If the template file does not exist, it returns an empty string
     * or could throw an exception based on how you choose to handle this case.
     *
     * @param array $vars An associative array of variables to pass to the template.
     * @return string The rendered template as a string.
     *
     * @throws Exception If the template file is not found and exception handling
     *                    is preferred over returning an empty string.
     */
    public function render(array $vars): string
    {
        $path = "index.tpl.php";

        if (file_exists($path)) {
            ob_start();
            extract($vars);
            require $path;
            return ob_get_clean();
        }
        return '';
    }

}






