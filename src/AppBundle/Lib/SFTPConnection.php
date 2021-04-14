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
        $local = fopen($localFile, 'w');
        $remote = fopen('ssh2.sftp://' . $this->sftp . $remoteFile, 'r');
        $read = 0;
        $filesize = filesize('ssh2.sftp://' . $this->sftp . $remoteFile);
        while ( ($read < $filesize) && ($buffer = fread($remote, $filesize - $read)) )
        {
            $read += strlen($buffer);
            if (fwrite($local, $buffer) === FALSE)
            {
                echo "Failed to write to local file: $file\n";
                break;
            }
        }
        fclose($local);
        fclose($remote);
//        if(!ssh2_scp_recv($this->connection, $remoteFile, $localFile)) {
//            throw new \Exception("Could not download: " . $remoteFile);
//        }
    }

    public function moveFile(string $from , string $to ): bool{
        return ssh2_sftp_rename($this->sftp, $from, $to);
    }
    
    public function fileExists($filePath): bool {
        return (bool) file_exists('ssh2.sftp://' . $this->sftp . $filePath );
    }

    public function deleteRemoteFile($filePath) {
        return ssh2_sftp_unlink($this->sftp, $filePath);
    }
    
    public function getFilesList($dir) {

        
        $files = array();
        $dirHandle = opendir("ssh2.sftp://{$this->sftp}{$dir}");

        while (false !== ($file = readdir($dirHandle))) {
            if ($file != '.' && $file != '..') {
                $files[] = $file;
            }
        }

        return $files;
    }
}
