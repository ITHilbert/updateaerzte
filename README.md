# UploadAerzte
Eine Komponente die als Basis für den Inhalt eine Website dient.
Diese soll in das Verzeichnis "packages" geclont werden.

## Installation
```
composer require ithilbert/uploadaerzte
```

### .env anpassen
### SFTP SETTINGS ###
```
SFTP_USERNAME=userName
SFTP_HOST=IPAdresse
SFTP_PORT=22
SFTP_ROOT='/home/aaa/database/seeders'
SFTP_PASSWORD=mein-passwort
```

### config/filesystems.php erweitern
```
'sftp' => [
            'driver' => 'sftp',
            'host' => env('SFTP_HOST'),

            // Settings for basic authentication...
            'username' => env('SFTP_USERNAME'),

            // Settings for SSH key based authentication with encryption password...
            'privateKey' => storage_path('app/ssh/igl_kundencenter_ssh'),
            'password' => env('SFTP_PASSWORD'),

            // Optional SFTP Settings...
            // 'hostFingerprint' => env('SFTP_HOST_FINGERPRINT'),
            'maxTries' => 4,
            'passphrase' => env('SFTP_PASSWORD'),
            'port' => (int) env('SFTP_PORT', 22),
            'root' => env('SFTP_ROOT', ''),
            'timeout' => 30,
//             'useAgent' => true,
//            'throw' => true, // Ab Laravel 9
        ],
```

### config/app.php Provider hinzufügen
```
\ITHilbert\UploadAerzte\UploadAerzteServiceProvider::class,
```


## Authoren
Jan Friedrichsen

Homepage: [webulous.de]("https://www.webulous.de")


und


IT-Hilbert GmbH

Access, Excel, VBA und Web Programmierungen

Homepage: [IT-Hilbert.com](https://www.IT-Hilbert.com) 
