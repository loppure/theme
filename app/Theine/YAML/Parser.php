<?php
/**
 * Definizione della classe per il parsing dei file yaml.
 *
 * @package      Theine
 * @subpackage   YAML
 * @author       Omar Polo <yum1096@gmail.com>
 */

namespace Theine\YAML;

use Symfony\Component\Yaml\Parser as SymfonyParser;

/**
 * Classe wrapper per `Symfony\Component\YAML\Parser`
 *
 * Questa classe fa da wrapper per la classe di parsing di Symfony.
 *
 * @author Omar Polo <yum1096@gmail.com>
 * @since  1.0.0 Introdotta
 * @todo   Sistemare l'organizzazione dei file, e mettere una variabile
 * esterna per la directory della cache.
 */
class Parser
{

    /**
     * Effettua il parsing di un file YAML usando
     * `Symfony\Component\YAML\Parser`.
     *
     * @param string $path Il percorso relativo del file YAML a
     * partire dalla root del tema.
     */
    public static function file($path)
    {
        $file = end(
            explode('/', $path)
        );

        if (!WP_DEBUG && self::cacheExists($file)) {
            return self::getCache($file);
        }

        return self::makeFileCache($path, $file);
    }

    /**
     * Crea un file di cache
     *
     * @return The content of the file to be cached
     */
    private static function makeFileCache($path, $file)
    {
        $yaml = new SymfonyParser();
        $data = $yaml->parse(file_get_contents(get_template_directory() . $path));

        $data_exported = var_export($data, true);

        mkdir(get_template_directory() . '/public/cache/parsed/');
        file_put_contents(
            get_template_directory() . '/public/cache/parsed/' . $file . '.cache.php',
            "<?php return $data_exported; ?>"
        );

        return $data;
    }

    /**
     * Controlla l'esistenza della cache
     *
     * @return Boolean `true` se la cache esiste, `false` altrimenti
     */
    private static function cacheExists($file)
    {
        return file_exists(
            get_template_directory() . '/public/cache/parsed/' . $file . '.cache.php'
        );
    }

    /**
     * Ritorna la cache contenuta nel file specificato. NON VERIFICA che tale
     * file esista pero!
     *
     * @param string $file il path al file di cache precedentemente creato. È
     *   RICHIESTO che il file esista
     * @return Il contenuto della cache
     */
    private static function getCache($file)
    {
        return include(get_template_directory() . '/public/cache/parsed/' . $file . '.cache.php');
    }
}
