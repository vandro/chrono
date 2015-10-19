<?php

/**
 * Reúne métodos para verificar os requisitos de inicialização e inicializar a
 * aplicação.
 * 
 * @author Jonathan Souza <jonathan.ralison@gmail.com>
 */
class Initialize {

    /**
     * Pesquisa pela chave fornecida nas variáveis de ambiente e retorna o valor da
     * variável encontrada ou o valor default, se a variável não existe no ambiente.
     * 
     * @param string $key chave a ser pesquisada
     * @param mixed $default valor padrão, caso a chave não esteja definida
     * @return mixed
     */
    private static final function env($key, $default = null) {
        $value = getenv($key);
        return ($value === FALSE) ? $default : $value;
    }

    /**
     * Configura a saída para o modo de texto, apresenta a mensagem fornecida na
     * tela e encerra a execução.
     * 
     * @param string $msg
     */
    private static final function initError($msg) {
        header('HTTP/1.1 500');
        header('Content-Type: text/plain; charset=utf-8');
        die("A aplicação não pode ser inicializada: {$msg}");
    }

    /**
     * Executa as operações de inicialização.
     */
    public final static function init() {
        self::defineConstants();
        self::includeFrameworkLib();
        self::checkExtraConfigFiles();

        // Inicializa
        $config = APP_ROOT . '/configs/mainConfig.php';
        if (!is_readable($config)) {
            self::initError('O arquivo de configurações está inacessível.');
        } else {
            Yii::createWebApplication($config)->run();
        }
    }

    private static final function defineConstants() {
        define('YII_DEBUG', (bool) self::env('YII_DEBUG'));
        define('WEB_ROOT', dirname(__FILE__));
        define('APP_ROOT', dirname(dirname(__FILE__)) . '/app');
    }

    private static final function includeFrameworkLib() {
        $yii = stream_resolve_include_path('Yii-1.1.16/yii.php');
        if ($yii === FALSE) {
            self::initError('A biblioteca base está inacessível.');
        } else {
            require_once $yii;
        }
    }

    private static final function checkExtraConfigFiles() {
        $extraConfigs = ['database.php', 'routes.php', 'packages.php'];
        foreach ($extraConfigs as $configFile) {
            $path = APP_ROOT . "/configs/{$configFile}";
            if (!is_readable($path)) {
                $filename = basename($path, '.php');
                self::initError(sprintf('O arquivo de configuração %s não está acessível.', $filename));
            }
        }
    }

}

/**
 * Chama o método de inicialização.
 */
Initialize::init();
