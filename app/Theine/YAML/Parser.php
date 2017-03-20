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
        // XXX: php è strano. Non posso fare
        // ```
        //  $file = end(explode('/', $path))
        // ```
        // perchè ottengo un errore, ma così è perfetto
        //
        // boh
        $_tmp = explode('/', $path);
        $file = end($_tmp);

        if (!WP_DEBUG && self::cacheExists($file)) {
            return self::getCache($file);
        }

        return self::makeFileCache($path, $file);
    }

    /**
     * Make the (php) cache file
     *
     * @return The content of the file to be cached
     */
    private static function makeFileCache($path, $file)
    {
        $yaml = new SymfonyParser();
        $data = $yaml->parse(file_get_contents(get_template_directory() . $path));

        $data_exported = var_export($data, true);

        $dir = get_template_directory() . '/public/cache/parsed';

        if (!file_exists($dir)) {
            mkdir($dir);
        }

        file_put_contents(
            get_template_directory() . '/public/cache/parsed/' . $file . '.cache.php',
            "<?php return $data_exported; ?>"
        );

        return $data;
    }

    /**
     *
     *
     */
    private static function cacheExists($file)
    {
        return file_exists(
            get_template_directory() . '/public/cache/parsed/' . $file . '.cache.php'
        );
    }

    /**
     *
     * @return The content of the cache file (via `import`)
ppppp     */
    private static function getCache($file)
    {
        return include(get_template_directory() . '/public/cache/parsed/' . $file . '.cache.php');
    }
}
