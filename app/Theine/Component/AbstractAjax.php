<?php
/**
 * Definizione della classe astratta per la creazione di interfaccie
 * ajax.
 *
 * @package      Theine
 * @subpackage   Component
 * @author       Omar Polo <yum1096@gmail.com>
 */

namespace Theine\Component;

use Theine\Debug\Exception\ForbiddenException;

/**
 * Questa classe fornisce una astrazione su ajax in wordpress.
 *
 * Permette di realizzare iterfacce ajax (private e pubbliche) in modo
 * più veloce. Integra il supporto alla creazione/verifica di nonces,
 * si occupa di gestire gli errori. Essendo astratta deve essere
 * estesa, e deve essere fornito il metodo `action`, ovvero quello
 * chiamato se viene effettuata una chiamata ajax con quel metodo e il
 * nonce risulta corretto.
 *
 * @author Omar Polo <yum1096@gmail.com>
 * @since  1.0.0 Introdotta
 */
abstract class AbstractAjax
{
    /**
     * Il nonce di questa sessione.
     *
     * @var string
     */
    private $nonce;

    /**
     * L'azione
     *
     * @var string
     */
    private $action;

    /**
     * Se pubblico oppure solo per gli utenti loggati
     *
     * @var bool
     */
    private $public;

    /**
     * Crea un nonce, privato e/o pubblico.
     *
     * @param string $action Il nome dell'azione. Va usata anche nella
     * chiamata Ajax da Javascript.
     * @param bool $public Se l'azione deve essere anche pubblica
     * oppure no.
     */
    public function __construct($action, $public = true)
    {
        $this->nonce = wp_create_nonce($action);
        $this->action = $action;

        $self = $this;
        add_action( 'wp_footer', function() use ($self) {
            echo '<input type="hidden" id="'. $this->getAction() .'-nonce"
            value="'. $this->nonce .'"/> ';
        });
    }

    /**
     * Aggiunge gli hook.
     *
     * @return void
     */
    public function run()
    {
        add_action('wp_ajax_' . $this->action, [$this, 'action']);

        if ($this->public) {
            add_action('wp_ajax_nopriv_' . $this->action, [$this, 'validate']);
        }
    }

    /**
     * Controlla il nonce. Se è errato, lancia un'eccezione.
     * Altrimenti chiama il metodo `action()`, e poi muore.
     *
     * @return void
     * @throws \Theine\Debug\Exception\ForbiddenException if the nonce
     * does not correspond
     */
    public function validate()
    {
        if (!check_ajax_refer($this->action, false, false)) {
            throw new ForbiddenException();
        } else {
            $this->action();
        }

        die("");
    }

    /**
     * Il getter per `$this->action`
     *
     * @return String $this->action
     */
    public function getAction()
    {
        return $this->action;
    }

    /**
     * Qusta funzione viene chiamata se il nonce viene verificato.
     */
    abstract public function action();
}
