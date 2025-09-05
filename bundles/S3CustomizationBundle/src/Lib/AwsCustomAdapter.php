<?php

declare(strict_types=1);

namespace S3CustomizationBundle\Lib;
use Aws\Api\DateTimeResult;
use Aws\S3\S3ClientInterface;
use BaconQrCode\Renderer\Path\Path;
use Generator;
use League\Flysystem\Config;
use League\Flysystem\DirectoryAttributes;
use League\Flysystem\FileAttributes;
use League\Flysystem\FilesystemAdapter;
use League\Flysystem\FilesystemOperationFailed;
use League\Flysystem\PathPrefixer;
use League\Flysystem\StorageAttributes;
use League\Flysystem\UnableToCheckDirectoryExistence;
use League\Flysystem\UnableToCheckFileExistence;
use League\Flysystem\UnableToCopyFile;
use League\Flysystem\UnableToCreateDirectory;
use League\Flysystem\UnableToDeleteFile;
use League\Flysystem\UnableToMoveFile;
use League\Flysystem\UnableToReadFile;
use League\Flysystem\UnableToRetrieveMetadata;
use League\Flysystem\UnableToSetVisibility;
use League\Flysystem\UnableToWriteFile;
use League\Flysystem\Visibility;
use League\MimeTypeDetection\FinfoMimeTypeDetector;
use League\MimeTypeDetection\MimeTypeDetector;
use Psr\Http\Message\StreamInterface;
use Throwable;
use League\Flysystem\AwsS3V3\PortableVisibilityConverter;
use phpDocumentor\Reflection\PseudoTypes\False_;
use phpDocumentor\Reflection\Types\Void_;
// use S3CustomizationBundle\Services\S3CustomizationService;
use S3CustomizationBundle\Lib\Utils;
use function trim;

class AwsCustomAdapter implements FilesystemAdapter
{

    // private $s3CustomizationService;
    /**
     * @var string[]
     */
    public const AVAILABLE_OPTIONS = [
        'ACL',
        'CacheControl',
        'ContentDisposition',
        'ContentEncoding',
        'ContentLength',
        'ContentType',
        'Expires',
        'GrantFullControl',
        'GrantRead',
        'GrantReadACP',
        'GrantWriteACP',
        'Metadata',
        'MetadataDirective',
        'RequestPayer',
        'SSECustomerAlgorithm',
        'SSECustomerKey',
        'SSECustomerKeyMD5',
        'SSEKMSKeyId',
        'ServerSideEncryption',
        'StorageClass',
        'Tagging',
        'WebsiteRedirectLocation',
    ];
    /**
     * @var string[]
     */
    public const MUP_AVAILABLE_OPTIONS = [
        'before_upload',
        'concurrency',
        'mup_threshold',
        'params',
        'part_size',
    ];

    /**
     * @var string[]
     */
    private  const EXTRA_METADATA_FIELDS = [
        'Metadata',
        'StorageClass',
        'ETag',
        'VersionId',
    ];

    /**
     * @var S3ClientInterface
     */
    private $client;

    /**
     * @var PathPrefixer
     */
    private $prefixer;

    /**
     * @var string
     */
    private $bucket;

    /**
     * @var VisibilityConverter
     */
    private $visibility;

    /**
     * @var MimeTypeDetector
     */
    private $mimeTypeDetector;

    /**
     * @var array
     */
    private $options;

    /**
     * @var bool
     */
    private $streamReads;

    public function __construct(
        S3ClientInterface $client,
        string $bucket,
        string $prefix = '',
        VisibilityConverter $visibility = null,
        MimeTypeDetector $mimeTypeDetector = null,
        array $options = [],
        bool $streamReads = true
    ) {
        $this->client = $client;
        $this->prefixer = new PathPrefixer($prefix);
        $this->bucket = $bucket;
        $this->visibility = $visibility ?: new PortableVisibilityConverter();
        $this->mimeTypeDetector = $mimeTypeDetector ?: new FinfoMimeTypeDetector();
        $this->options = $options;

        $this->streamReads = $streamReads;
    }

    public function fileExists(string $path): bool
    {
        try {
            
            if($path[0] != "/"){
                $path = "/".$path;
            }
            $path = $this->getS3PathForPimcorePath($path , false, false);
            return $this->client->doesObjectExist($this->bucket, $this->prefixer->prefixPath($path), $this->options);
        } catch (Throwable $exception) {
            throw UnableToCheckFileExistence::forLocation($path, $exception);
        }
    }

    public function directoryExists(string $path): bool
    {
        try {
            $path = $this->getS3PathForPimcorePath($path);
            $prefix = $this->prefixer->prefixDirectoryPath($path);
            $options = ['Bucket' => $this->bucket, 'Prefix' => $prefix, 'MaxKeys' => 1, 'Delimiter' => '/'];
            $command = $this->client->getCommand('ListObjects', $options);
            $result = $this->client->execute($command);

            return $result->hasKey('Contents') || $result->hasKey('CommonPrefixes');
        } catch (Throwable $exception) {
            // dd($exception);
            throw UnableToCheckDirectoryExistence::forLocation($path, $exception);
        }
    }

    public function write(string $path, string $contents, Config $config): void
    {
        $path = $this->getS3PathForPimcorePath($path);
        $this->upload($path, $contents, $config);
    }

    /**
     * @param string          $path
     * @param string|resource $body
     * @param Config          $config
     */
    private function upload(string $path, $body, Config $config): void
    {
        $key = $this->prefixer->prefixPath($path);
        $options = $this->createOptionsFromConfig($config);
        $acl = $options['params']['ACL'] ?? $this->determineAcl($config);
        $shouldDetermineMimetype = $body !== '' && !array_key_exists('ContentType', $options['params']);
        if ($shouldDetermineMimetype && $mimeType = $this->mimeTypeDetector->detectMimeType($key, $body)) {
            $options['params']['ContentType'] = $mimeType;
        }
        try {
            $this->client->upload($this->bucket, $key, $body, $acl, $options);
        } catch (Throwable $exception) {
            throw UnableToWriteFile::atLocation($path, '', $exception);
        }
    }

    private function determineAcl(Config $config): string
    {
        $visibility = (string) $config->get(Config::OPTION_VISIBILITY, Visibility::PRIVATE);

        return $this->visibility->visibilityToAcl($visibility);
    }

    private function createOptionsFromConfig(Config $config): array
    {
        $config = $config->withDefaults($this->options);
        $options = ['params' => []];

        if ($mimetype = $config->get('mimetype')) {
            $options['params']['ContentType'] = $mimetype;
        }

        foreach (static::AVAILABLE_OPTIONS as $option) {
            $value = $config->get($option, '__NOT_SET__');

            if ($value !== '__NOT_SET__') {
                $options['params'][$option] = $value;
            }
        }

        foreach (static::MUP_AVAILABLE_OPTIONS as $option) {
            $value = $config->get($option, '__NOT_SET__');

            if ($value !== '__NOT_SET__') {
                $options[$option] = $value;
            }
        }

        return $options;
    }

    public function writeStream(string $path, $contents, Config $config): void
    {
        if (strpos($path, 'Bulk Asset Upload/') !== false){
            $path = $this->getS3PathForPimcorePath($path, false, false);
        }else{
            $path = $this->getS3PathForPimcorePath($path, false, false);
        }
        // $path = $this->getS3PathForPimcorePath($path,false,false);
        $this->upload($path, $contents, $config);
    }

    public function read(string $path): string
    {
        $path = $this->getS3PathForPimcorePath($path);
        $body = $this->readObject($path, false);

        return (string) $body->getContents();
    }

    public function readStream(string $path)
    {
        if (strpos($path, 'Bulk Asset Upload/') !== false){
            $path = $this->getS3PathForPimcorePath($path, false, false);
        }else{
            $path = $this->getS3PathForPimcorePath($path, false, false);
        }
        /** @var resource $resource */
        $resource = $this->readObject($path, true)->detach();
        return $resource;
    }

    public function delete(string $path): void
    { 
        $path = $this->getS3PathForPimcorePath($path,false , false);
        $arguments = ['Bucket' => $this->bucket, 'Key' => $this->prefixer->prefixPath($path)];
        $command = $this->client->getCommand('DeleteObject', $arguments);

        try {
            $this->client->execute($command);
        } catch (Throwable $exception) {
            throw UnableToDeleteFile::atLocation($path, '', $exception);
        }
    }

    public function deleteDirectory(string $path): void
    {
        $path = $this->getS3PathForPimcorePath($path);
        $prefix = $this->prefixer->prefixPath($path);
        $prefix = ltrim(rtrim($prefix, '/') . '/', '/');

        try {
            $this->client->deleteMatchingObjects($this->bucket, $prefix);
        } catch (Throwable $exception) {
            throw UnableToCreateDirectory::dueToFailure($path, $exception);
        }
    }

    public function createDirectory(string $path, Config $config):void
    {
        $is_folder_request = Utils::getIsFolderrenamerequest();
        if($is_folder_request ){
         return;
        }
         
        $path = $this->getS3PathForPimcorePath($path);
        $defaultVisibility = $config->get('directory_visibility', $this->visibility->defaultForDirectories());
        $config = $config->withDefaults(['visibility' => $defaultVisibility]);
        $this->upload(rtrim($path, '/') . '/', '', $config);
        
    }

    public function setVisibility(string $path, string $visibility): void
    {
        $path = $this->getS3PathForPimcorePath($path);

        $arguments = [
            'Bucket' => $this->bucket,
            'Key' => $this->prefixer->prefixPath($path),
            'ACL' => $this->visibility->visibilityToAcl($visibility),
        ];
        $command = $this->client->getCommand('PutObjectAcl', $arguments);

        try {
            $this->client->execute($command);
        } catch (Throwable $exception) {
            throw UnableToSetVisibility::atLocation($path, '', $exception);
        }
    }

    public function visibility(string $path): FileAttributes
    {
        $path = $this->getS3PathForPimcorePath($path, false, false);

        $arguments = ['Bucket' => $this->bucket, 'Key' => $this->prefixer->prefixPath($path)];
        $command = $this->client->getCommand('GetObjectAcl', $arguments);

        try {
            $result = $this->client->execute($command);
        } catch (Throwable $exception) {
            throw UnableToRetrieveMetadata::visibility($path, '', $exception);
        }

        $visibility = $this->visibility->aclToVisibility((array) $result->get('Grants'));

        return new FileAttributes($path, null, $visibility);
    }

    private function fetchFileMetadata(string $path, string $type): FileAttributes
    {
        $arguments = ['Bucket' => $this->bucket, 'Key' => $this->prefixer->prefixPath($path)];
        $command = $this->client->getCommand('HeadObject', $arguments);
        try {
            $result = $this->client->execute($command);
        } catch (Throwable $exception) {
            throw UnableToRetrieveMetadata::create($path, $type, '', $exception);
        }

        $attributes = $this->mapS3ObjectMetadata($result->toArray(), $path);

        if (!$attributes instanceof FileAttributes) {
            throw UnableToRetrieveMetadata::create($path, $type, '');
        }

        return $attributes;
    }

    private function mapS3ObjectMetadata(array $metadata, string $path): StorageAttributes
    {
        if (substr($path, -1) === '/') {
            return new DirectoryAttributes(rtrim($path, '/'));
        }

        $mimetype = $metadata['ContentType'] ?? null;
        $fileSize = $metadata['ContentLength'] ?? $metadata['Size'] ?? null;
        $fileSize = $fileSize === null ? null : (int) $fileSize;
        $dateTime = $metadata['LastModified'] ?? null;
        $lastModified = $dateTime instanceof DateTimeResult ? $dateTime->getTimeStamp() : null;

        return new FileAttributes(
            $path,
            $fileSize,
            null,
            $lastModified,
            $mimetype,
            $this->extractExtraMetadata($metadata)
        );
    }

    private function extractExtraMetadata(array $metadata): array
    {
        $extracted = [];
        foreach (static::EXTRA_METADATA_FIELDS as $field) {
            if (isset($metadata[$field]) && $metadata[$field] !== '') {
                $extracted[$field] = $metadata[$field];
            }
        }

        return $extracted;
    }

    public function mimeType(string $path): FileAttributes
    {
        if (strpos($path, 'Bulk Asset Upload/') !== false){
            $path = $this->getS3PathForPimcorePath($path, false, false);
        }else{
            $path = $this->getS3PathForPimcorePath($path, false, false);
        }
        $attributes = $this->fetchFileMetadata($path, FileAttributes::ATTRIBUTE_MIME_TYPE);

        if ($attributes->mimeType() === null) {
            throw UnableToRetrieveMetadata::mimeType($path);
        }

        return $attributes;
    }

    public function lastModified(string $path): FileAttributes
    {
        $path = $this->getS3PathForPimcorePath($path, false, false);

        $attributes = $this->fetchFileMetadata($path, FileAttributes::ATTRIBUTE_LAST_MODIFIED);

        if ($attributes->lastModified() === null) {
            throw UnableToRetrieveMetadata::lastModified($path);
        }

        return $attributes;
    }

    public function fileSize(string $path): FileAttributes
    {
        if (strpos($path, 'Bulk Asset Upload/') !== false){
            $path = $this->getS3PathForPimcorePath($path, false, false);
        }else{
            $path = $this->getS3PathForPimcorePath($path, false, false);
        }
        $attributes = $this->fetchFileMetadata($path, FileAttributes::ATTRIBUTE_FILE_SIZE);
        if ($attributes->fileSize() === null) {
            throw UnableToRetrieveMetadata::fileSize($path);
        }

        return $attributes;
    }

    public function listContents(string $path, bool $deep): iterable
    {
        $path = $this->getS3PathForPimcorePath($path, false, false);

        $prefix = trim($this->prefixer->prefixPath($path), '/');
        $prefix = empty($prefix) ? '' : $prefix . '/';
        $options = ['Bucket' => $this->bucket, 'Prefix' => $prefix];

        if ($deep === false) {
            $options['Delimiter'] = '/';
        }

        $listing = $this->retrievePaginatedListing($options);

        foreach ($listing as $item) {
            $key = $item['Key'] ?? $item['Prefix'];

            if ($key === $prefix) {
                continue;
            }

            yield $this->mapS3ObjectMetadata($item, $this->prefixer->stripPrefix($key));
        }
    }

    private function retrievePaginatedListing(array $options): Generator
    {
        $resultPaginator = $this->client->getPaginator('ListObjectsV2', $options + $this->options);

        foreach ($resultPaginator as $result) {
            yield from ($result->get('CommonPrefixes') ?: []);
            yield from ($result->get('Contents') ?: []);
        }
    }

    public function move(string $source, string $destination, Config $config): void
    {

        // ----------------- customization open -------------------
        /**
         * this is done to stop folder renaming at S3
         * this function may be being used for file renaming as well
         * so need to check and handle that
         */
        $is_folder = $this->getS3PathForPimcorePathType($source);
        // echo "Source:$source"."\n";
        // echo "destination:$destination";
        if($is_folder === 'folder') {
           
            return;
        } 
            try {
                $source = $this->getS3PathForPimcorePath($source, false, false);
                
                $destination = $this->getS3PathForPimcorePath($destination, false, false);
                
                $this->copy($source, $destination, $config);
                $this->delete($source);
            } catch (FilesystemOperationFailed $exception) {
                throw UnableToMoveFile::fromLocationTo($source, $destination, $exception);
            }
        
    }

    public function copy(string $source, string $destination, Config $config): void
    {
       
            try {
                $source = $this->getS3PathForPimcorePath($source, false, false);
                $destination = $this->getS3PathForPimcorePath($destination, false, false);
                /** @var string $visibility */
                $visibility = $this->visibility($source)->visibility();
            } catch (Throwable $exception) {
                throw UnableToCopyFile::fromLocationTo(
                    $source,
                    $destination,
                    $exception
                );
            }

            try {
       
                $this->client->copy(
                    $this->bucket,
                    $this->prefixer->prefixPath($source),
                    $this->bucket,
                    $this->prefixer->prefixPath($destination),
                    $this->visibility->visibilityToAcl($visibility),
                    $this->createOptionsFromConfig($config)['params']
                );
            } catch (Throwable $exception) {
                throw UnableToCopyFile::fromLocationTo($source, $destination, $exception);
            }
        
    }

    private function readObject(string $path, bool $wantsStream): StreamInterface
    {
        
        $options = ['Bucket' => $this->bucket, 'Key' => $this->prefixer->prefixPath($path)];
        if ($wantsStream && $this->streamReads && !isset($this->options['@http']['stream'])) {
            $options['@http']['stream'] = true;
        }
        $command = $this->client->getCommand('GetObject', $options + $this->options);
        
        try {
            $res = $this->client->execute($command)->get('Body');
            return $res;
        } catch (Throwable $exception) {
            throw UnableToReadFile::fromLocation($path, '', $exception);
        }
    }

    private function getS3PathForPimcorePath($pimcorePath, $isPathStartsFromAsset = false, $returnCompletePath = true)
    {
        $service =  \Pimcore::getKernel()->getContainer()->get("app.s3.customization_service");
        return $service->getS3PathForPimcorePath($pimcorePath, $isPathStartsFromAsset, $returnCompletePath);
    }
        /**
         * This is function return the assts is folder type or Files
         *
         */
    private function getS3PathForPimcorePathType($pimcorePath)
    {
        /**
         * This is function return the assts is folder type or Files
         *
         */
        $service =  \Pimcore::getKernel()->getContainer()->get("app.s3.customization_service");
        return $service->getPimcoreAsstesType($pimcorePath);
    }
}