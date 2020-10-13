<?php

namespace AppBundle\Lib;


class SFTPConnection
{
    private $connection;
    private $sftp;

    public function __construct($host, $port=22)
    {
        $this->connection = ssh2_connect($host, $port);
        if (! $this->connection)
            throw new \Exception("Could not connect to $host on port $port.");
    }

    public function login($username, $password)
    {
        if (! ssh2_auth_password($this->connection, $username, $password))
            throw new \Exception("Could not authenticate with username $username " .
                "and password $password.");

        $this->sftp = ssh2_sftp($this->connection);
        if (! $this->sftp)
            throw new \Exception("Could not initialize SFTP subsystem.");
    }

    public function uploadFile(string $localFile,string $remoteFile): void
    {
        $stream = fopen("ssh2.sftp://$this->sftp$remoteFile", 'w');

        if (! $stream)
            throw new \Exception("Could not open file: $remoteFile");

        $data_to_send = file_get_contents($localFile);
        if ($data_to_send === false)
            throw new \Exception("Could not open local file: $localFile.");

        if (fwrite($stream, $data_to_send) === false)
            throw new \Exception("Could not send data from file: $localFile.");

        fclose($stream);
    }

    public function downloadFile(string $localFile, string $remoteFile): void {

        if(!file_exists('ssh2.sftp://' . $this->sftp . $remoteFile )){
            throw new \Exception("File " . $remoteFile . " does not exist.");
        }

        if(!ssh2_scp_recv($this->connection, $remoteFile, $localFile)) {
            throw new \Exception("Could not download: " . $remoteFile);
        }
    }

}
